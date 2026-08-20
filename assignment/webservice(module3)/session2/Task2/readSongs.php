<?php

header("Content-Type: application/json");

// Database Connection
$conn = mysqli_connect("localhost", "root", "", "music_db");

if (!$conn) {
    die(json_encode(["message" => "Connection Failed"]));
}

// Fetch Songs
$sql = "SELECT * FROM songs";
$result = mysqli_query($conn, $sql);

$songs = [];

while ($row = mysqli_fetch_assoc($result)) {
    $songs[] = $row;
}

// Return JSON
echo json_encode($songs);

mysqli_close($conn);

?>