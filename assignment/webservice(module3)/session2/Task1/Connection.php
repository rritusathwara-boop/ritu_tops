<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "music_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die(json_encode([
        "status" => false,
        "message" => "Database Connection Failed"
    ]));
}

?>