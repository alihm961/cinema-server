<?php
require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../models/Movie.php');


$response = [
    "status" => 200,
    "movies" => []
];

$movies = Movie::all($mysqli);

foreach ($movies as $movie) {
    $response["movies"][] = $movie->toArray();
}

echo json_encode($response);