<?php
require_once(__DIR__ . '/../connection/connection.php');

$query = "
CREATE TABLE IF NOT EXISTS bookings (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
showtime_id INT NOT NULL,
total_price DECIMAL(10,2) NOT NULL,
status VARCHAR(50) DEFAULT 'confirmed',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (showtime_id) REFERENCES showtimes(id)
);
";

$statement = $mysqli->prepare($query);
$statement->execute();