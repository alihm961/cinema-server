<?php
require_once(__DIR__ . '/../connection/connection.php');

$query = "
CREATE TABLE IF NOT EXISTs users (
id INT AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(255) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
name VARCHAR(255),
phone VARCHAR(20),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

$statment = $mysqli->prepare($query);
$statment->execute();