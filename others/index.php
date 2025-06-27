<?php
require_once("../connection/connection.php");

echo $mysqli->ping () ? "Connected" : "Failed";