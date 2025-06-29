<?php
require_once "../models/User.php";
require_once "../connection/connection.php";


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");

$data = [
  "email" => $_POST["email"] ?? null,
  "password" => $_POST["password"] ?? null,
  "name" => $_POST["name"] ?? null,
  "phone" => $_POST["phone"] ?? null,
  "is_adult" => $_POST["is_adult"] ?? 0,
  "is_admin" => 0
];

if (!$data["email"] || !$data["password"]) {
  http_response_code(400);
  echo json_encode(["status" => 400, "message" => "Email and password are required"]);
  exit;
}

$user = new User($data);
$user->save($mysqli);

echo json_encode(["status" => 200, "message" => "User registered successfully"]);
?>