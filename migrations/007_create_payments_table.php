<?php
require_once(__DIR__ . '/../connection/connection.php');

$query = "
CREATE TABLE IF NOT EXISTS payments (
id INT AUTO_INCREMENT PRIMARY KEY,
booking_id INT,
user_id INT,
amount DECIMAL(6,2),
payment_method VARCHAR(20) DEFAULT 'unknown',
FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

";

$statment = $mysqli->prepare($query);
$statment->execute();