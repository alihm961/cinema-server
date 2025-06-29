<?php
require_once "../connection/connection.php";

$sql = "CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    genre VARCHAR(50),
    poster_url TEXT,
    trailer_url TEXT
)";
$mysqli->query($sql);
?>