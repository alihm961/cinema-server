<?php
require_once "../models/Movie.php";
require_once "../connection/connection.php";

$admin_id = $_POST["admin_id"] ?? "";
if (!$admin_id) {
    http_response_code(403);
    echo json_encode(["status" => 403, "message" => "Admin ID required"]);
    exit;
}

$movie = new Movie($_POST);
$movie->save($mysqli);
echo json_encode(["status" => 200, "message" => "Movie added"]);