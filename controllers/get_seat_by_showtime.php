<?php
require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../models/Seat.php');

$showtime_id = $_GET['showtime_id'] ?? null;

if (!$showtime_id) {
    echo json_encode(["status" => 400, "message" => "Missing showtime_id"]);
    exit;
}

$seat = seat::getByShowtime($showtime_id);
echo json_encode(["status" => 200, "seats" => $seats]);