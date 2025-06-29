<?php
require_once "../connection/connection.php";

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email=? AND password=? AND is_admin=1";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$admin = $stmt->get_result()->fetch_assoc();

if ($admin) {
    echo json_encode(["status" => 200, "admin_id" => $admin["id"]]);
} else {
    echo json_encode(["status" => 401, "message" => "Invalid admin credentials"]);
}