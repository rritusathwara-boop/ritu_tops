<?php

header("Content-Type: application/json");

// Database Connection
$conn = mysqli_connect("localhost", "root", "", "music_db");

// Check Connection
if (!$conn) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Database Connection Failed"
    ]);
    exit();
}

// Fetch Songs
$sql = "SELECT * FROM songs";
$result = mysqli_query($conn, $sql);

$songs = [];

while ($row = mysqli_fetch_assoc($result)) {
    $songs[] = $row;
}

echo json_encode($songs);

mysqli_close($conn);

?>