<?php
require_once "../connection/connection.php";

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100),
    phone VARCHAR(20),
    is_adult BOOLEAN DEFAULT 0,
    is_admin BOOLEAN DEFAULT 0
)";
$mysqli->query($sql);

?>