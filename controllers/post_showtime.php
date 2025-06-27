<?php
require_once("../models/Showtime.php");
require_once("../connection/connection.php");
session_start();

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    http_response_code(403);
    echo json_encode(["message" => "Admin access only"]);
    exit;
}

$data = $_POST;
$showtime = new Showtime($data);
$showtime->save($mysqli);
echo json_encode(["message" => "Showtime created"]);
?>