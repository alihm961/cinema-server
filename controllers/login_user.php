<?php
require_once "../connection/connection.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");

$input = json_decode(file_get_contents("php://input"), true);
$email = $input["email"] ?? null;
$password = $input["password"] ?? null;

$sql = "SELECT * FROM users WHERE email=? AND password=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if ($user) {
  echo json_encode([
    "status" => 200,
    "user_id" => $user["id"],
    "is_admin" => $user["is_admin"]
  ]);
} else {
  echo json_encode(["status" => 401, "message" => "Invalid credentials"]);
}