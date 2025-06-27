<?php
require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../models/Showtime.php');

$response = [
    "status" => 200,
    "message" => []
];

$showtimes = Showtime::all($mysqli);

foreach ($showtimes as $showtime) {
    $response["showtimes"][] = $showtime->toArray();
}

echo json_encode($response);