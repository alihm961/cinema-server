<?php
require_once(__DIR__ . '/../connection/connection.php');

$response = [
    "status" => 400,
    "message" => "Missing required parameters."
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    $seat_id = $_POST['seat_id'] ?? null;
    $showtime_id = $_POST['showtime_id'] ?? null;

    if (!$user_id || !$seat_id || !$showtime_id) {
        echo json_encode($response);
        exit;
    }

    $stmt = $mysqli->prepare("SELECT id FROM showtimes WHERE id = ?");
    $stmt->bind_param("i", $showtime_id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 0) {
        $dummyShow = $mysqli->prepare("INSERT INTO showtimes (movie_id, show_date, show_time, screen) VALUES (1, '2025-01-01', '12:00:00', 'A')");
        $dummyShow->execute();
        $showtime_id = $dummyShow->insert_id;
    }

    $stmt = $mysqli->prepare("SELECT id FROM seats WHERE id = ?");
    $stmt->bind_param("i", $seat_id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 0) {
        $dummySeat = $mysqli->prepare("INSERT INTO seats (seat_number, row, col) VALUES ('A1', 'A', 1)");
        $dummySeat->execute();
        $seat_id = $dummySeat->insert_id;
    }

    $stmt = $mysqli->prepare("SELECT id FROM bookings 
        JOIN booking_seats ON bookings.id = booking_seats.booking_id
        WHERE booking_seats.seat_id = ? AND bookings.showtime_id = ?");
    $stmt->bind_param("ii", $seat_id, $showtime_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $response['message'] = "Seat already booked";
        echo json_encode($response);
        exit;
    }

    $total_price = 10.00;

    $stmt1 = $mysqli->prepare("INSERT INTO bookings (user_id, showtime_id, total_price) VALUES (?, ?, ?)");
    $stmt1->bind_param("iid", $user_id, $showtime_id, $total_price);
    if (!$stmt1->execute()) {
        $response['message'] = "Error inserting booking.";
        echo json_encode($response);
        exit;
    }

    $booking_id = $stmt1->insert_id;

    $stmt2 = $mysqli->prepare("INSERT INTO booking_seats (booking_id, seat_id) VALUES (?, ?)");
    $stmt2->bind_param("ii", $booking_id, $seat_id);
    if (!$stmt2->execute()) {
        $response['message'] = "Error inserting seat.";
        echo json_encode($response);
        exit;
    }

    $response = [
        "status" => 200,
        "message" => "Booking successful",
        "booking_id" => $booking_id,
        "total_price" => $total_price
    ];
}

echo json_encode($response);