<?php
require_once("../models/Movie.php");
require_once("../connection/connection.php");
session_start()

if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    http_response_code(403);
    echo json_encode(["message" => "Admin access only"]);
    exit;
}

$data = $_POST;
$movie = new Movie($data);
$movie->save($mysqli);
echo json_encode(["message"] => "Movie created")

?>