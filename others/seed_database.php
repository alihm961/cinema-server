<?php

require_once(__DIR__ . '/../connection/connection.php');

$movies = [
    ['title' => 'Final destination', 'genre' => 'Horror', 'rating' => 'Top-10', 'description' => '18+'],
    ['title' => 'The Matrix', 'genre' => 'Action', 'rating' => 'Top-10', 'description' => 'Reality is a simulation.'],
    ['title' => 'Interstellar', 'genre' => 'Adventure', 'rating' => 'Top-10', 'description' => 'Space and time travel.'],
];

foreach ($movies as $movie) {
    $stmt = $mysqli->prepare("INSERT INTO movies (title, genre, rating, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $movie['title'], $movie['genre'], $movie['rating'], $movie['description']);
    $stmt->execute();
}


$movieIds = [];
$result = $mysqli->query("SELECT id FROM movies");
while ($row = $result->fetch_assoc()) {
    $movieIds[] = $row['id'];
}

$showtimes = [
    [$movieIds[0], '2025-07-01', '18:00:00', 'A'],
    [$movieIds[1], '2025-07-01', '20:00:00', 'B']
];

foreach ($showtimes as $show) {
    $stmt = $mysqli->prepare("INSERT INTO showtimes (movie_id, show_date, show_time, screen) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $show[0], $show[1], $show[2], $show[3]);
    $stmt->execute();
}

echo "Seeder Completed";