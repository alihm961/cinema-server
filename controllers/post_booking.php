<?php
require_once("../models/Booking.php");
require_once("../connection/connection.php");

$data = $_POST;
$booking = new Booking($data);
$booking->save($mysqli);
echo json_encode(["message" => "Booking confirmed"]);

?>