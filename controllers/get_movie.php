<?php
require_once "../models/Movie.php";
require_once "../connection/connection.php";

$movies = Movie::all($mysqli);
echo json_encode($movies);