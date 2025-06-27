<?php
require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../models/User.php');

$response = [
    "status" => 400, "message" => "Invalid email or password"
];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = User::getByEmail($mysqli, $email);

    if ($user && password_verify($password, $user->getPassword())) {
        $response['status'] = 200;
        $response['message'] = "Login successful";
        $response['user'] = $user->toArray();
    }
}

echo json_encode($response);