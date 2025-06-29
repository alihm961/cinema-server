<?php
require_once "../connection/connection.php";

$data = json_decode(file_get_contents("php://input"), true);
$discount = $data["discount_percent"];
$bookingId = $data["booking_id"];

$stmt = $mysqli->prepare("UPDATE bookings SET status=? WHERE id=?");
$status = "discount_" . $discount;
$stmt->bind_param("si", $status, $bookingId);
$stmt->execute();

echo json_encode(["status" => 200, "message" => "Discount applied"]);