<?php
require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../models/User.php');

$response = [
    "status" => 400, "message" => "Something went wrong"
];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $name = $_POST['name'] ?? null;
    $phone = $_POST['phone'] ?? null;

    if (!$email || !$password) {
        $response['message'] = "Email and password are required";
        echo json_encode($response);
        return;
    }

    $check = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $response["status"] = 409;
        $response ["message"] = "Email already exists";
        echo json_encode($response);
        return;
    }

    $hashed = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (email, password, name, phone) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssss", $email, $hashed, $name, $phone);

    if ($stmt->execute()) {
        $response["status"] = 200;
        $response["message"] = "User registered successfully";
    } else {
        $response["message"] = "Failed: " . $mysqli->error;
    }
}

echo json_encode($response);