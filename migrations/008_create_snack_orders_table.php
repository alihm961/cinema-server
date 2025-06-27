<?php
require_once(__DIR__ . '/../connection/connection.php');

$query = "
CREATE TABLE IF NOT EXISTS snack_orders (
id INT AUTO_INCREMENT PRIMARY KEY,
booking_id INT,
snack_name VARCHAR(20),
quantity INT DEFAULT 1,
price DECIMAL(6,2) DEFAULT 0.00,
FOREIGN KEY (booking_id) REFERENCES bookings(id)
);
";

$statment = $mysqli->prepare($query);
$statment->execute();