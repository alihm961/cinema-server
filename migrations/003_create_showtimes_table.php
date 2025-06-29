<?php
require_once "../connection/connection.php";

$sql = "CREATE TABLE IF NOT EXISTS showtimes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT,
    datetime DATETIME,
    FOREIGN KEY (movie_id) REFERENCES movies(id)
)";
$mysqli->query($sql);
?>