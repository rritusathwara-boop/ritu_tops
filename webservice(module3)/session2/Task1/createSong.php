<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include "connection.php";

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Check if data exists
if (!$data) {
    echo json_encode([
        "status" => false,
        "message" => "Invalid JSON data"
    ]);
    exit;
}

// Get values
$title = $data['title'];
$artist = $data['artist'];
$duration = $data['duration'];

// Validate
if (empty($title) || empty($artist) || empty($duration)) {
    echo json_encode([
        "status" => false,
        "message" => "All fields are required"
    ]);
    exit;
}

// Insert query
$sql = "INSERT INTO songs(title, artist, duration)
        VALUES('$title', '$artist', '$duration')";

if (mysqli_query($conn, $sql)) {
    echo json_encode([
        "status" => true,
        "message" => "Song added successfully",
        "id" => mysqli_insert_id($conn)
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => mysqli_error($conn)
    ]);
}

mysqli_close($conn);

?>