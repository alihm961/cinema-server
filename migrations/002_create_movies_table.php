<?php
require_once(__DIR__ . '/../connection/connection.php');

$query = "
CREATE TABLE IF NOT EXISTS movies (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
genre VARCHAR(100),
rating VARCHAR(10),
description TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

";

$statement = $mysqli->prepare($query);
$statement->execute();