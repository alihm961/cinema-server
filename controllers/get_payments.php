<?php
require_once("../models/Payment.php");
require_once("../connection/connection.php");

$response = ["status" => 200];

if (!isset($_GET["id"])) {
    $items = Payment::all($mysqli);
    $response["payments"] = [];
    foreach ($items as $item) {
        $response["payments"][] = $item->toArray();
    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$item = Payment::find($mysqli, $id);
$response["payment"] = $item->toArray();
echo json_encode($response);
return;
?>