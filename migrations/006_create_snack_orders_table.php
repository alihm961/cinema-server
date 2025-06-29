<?php
require_once "../connection/connection.php";

$sql = "CREATE TABLE IF NOT EXISTS snack_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    snack_id INT,
    quantity INT,
    price FLOAT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (snack_id) REFERENCES snacks(id)
)";
$mysqli->query($sql);
?>