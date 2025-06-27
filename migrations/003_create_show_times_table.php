<?php
require_once(__DIR__ . '/../connection/connection.php');

$query = "
CREATE TABLE IF NOT EXISTS showtimes (
id INT AUTO_INCREMENT PRIMARY KEY,
movie_id INT NOT NULL,
show_date DATE NOT NULL,
show_time TIME NOT NULL,
screen VARCHAR(50),
FOREIGN KEY (movie_id) REFERENCES movies(id) 
);
";

$statement = $mysqli->prepare($query);
$statement->execute();