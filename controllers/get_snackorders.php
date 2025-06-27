<?php
require_once("../models/SnackOrder.php");
require_once("../connection/connection.php");

$response = ["status" => 200];

if (!isset($_GET["id"])) {
    $items = SnackOrder::all($mysqli);
    $response["snackorders"] = [];
    foreach ($items as $item) {
        $response["snackorders"][] = $item->toArray();
    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$item = SnackOrder::find($mysqli, $id);
$response["snackorder"] = $item->toArray();
echo json_encode($response);
return;
?>