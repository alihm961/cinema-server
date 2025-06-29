<?php
require_once "../models/Booking.php";
require_once "../connection/connection.php";

$booking = new Booking($_POST);
$booking->save($mysqli);
echo json_encode(["status" => 200, "message" => "Booking confirmed"]);