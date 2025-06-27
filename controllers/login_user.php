<?php
require_once("../models/User.php");
require_once("../connection/connection.php");

session_start();

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (!$email || !$password) {
    echo json_encode(["status" => 400, "message" => "Email and password are required"]);
    exit;
}

$user = User::getByEmail($mysqli, $email);

if (!$user || !$user->checkPassword($password)) {
    http_response_code(401);
    echo json_encode(["status" => 401, "message" => "Invalid credentials"]);
    exit;
}

$_SESSION['user_id'] = $user->getId();
echo json_encode(["status" => 200, "message" => "Login successful", "user" => $user->toArray()]);