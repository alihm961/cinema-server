<?php
require_once "../models/User.php";
require_once "../models/Booking.php";
require_once "../connection/connection.php";

$admin_id = $_POST["admin_id"] ?? "";
if (!$admin_id) {
    http_response_code(403);
    echo json_encode(["status" => 403, "message" => "Admin ID required"]);
    exit;
}

$users = User::all($mysqli);

foreach ($users as $u) {
    if (!$u->is_adult) continue;
    $booking = new Booking([
        "user_id" => $u->id,
        "showtime_id" => 1,
        "seat_number" => "AUTO-" . rand(1, 100),
        "status" => "auto"
    ]);
    $booking->save($mysqli);
}

echo json_encode(["status" => 200, "message" => "Cinema night booked"]);