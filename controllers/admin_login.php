<?php
require("../connection/connection.php");
session_start();

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

if ($email === 'admin@cinema.com' && $password === 'admin123') {
    $_SESSION['is_admin'] = true;
    echo json_encode([
        "status" => 200,
        "message" => "Admin logged in"
    ]);
} else {
    http_response_code(403);
    echo json_encode([
        "status" => 403,
        "message" => "Invalid admin credentials"
    ]);
}