<?php
require_once(__DIR__ . '/../connection/connection.php');

$query = "
CREATE TABLE IF NOT EXISTS seats (
id INT AUTO_INCREMENT PRIMARY KEY,
seat_number VARCHAR(10) NOT NULL,
screen VARCHAR(50) NOT NULL,
is_vip BOOLEAN DEFAULT 0
);
";

$statement = $mysqli->prepare($query);
$statement->execute();