<?php
require_once "../connection/connection.php";

$sql = "CREATE TABLE IF NOT EXISTS snacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price FLOAT
)";
$mysqli->query($sql);
?>