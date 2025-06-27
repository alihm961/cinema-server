<?php
require_once(__DIR__ . '/../connection/connection.php');

$query = "
CREATE TABLE IF NOT EXISTS booking_seats (
id INT AUTO_INCREMENT PRIMARY KEY,
booking_id INT NOT NULL,
seat_id INT NOT NULL,
FOREIGN KEY (booking_id) REFERENCES bookings(id),
FOREIGN KEY (seat_id) REFERENCES seats(id)
);
";

$statement = $mysqli->prepare($query);
$statement->execute();