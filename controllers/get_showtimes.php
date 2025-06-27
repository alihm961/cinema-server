<?php
require_once("../models/Showtime.php");
require_once("../connection/connection.php");

$response = ["status" => 200];

if (!isset($_GET["id"])) {
    $items = Showtime::all($mysqli);
    $response["showtimes"] = [];
    foreach ($items as $item) {
        $response["showtimes"][] = $item->toArray();
    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$item = Showtime::find($mysqli, $id);
$response["showtime"] = $item->toArray();
echo json_encode($response);
return;
?>