<?php

header("Content-Type: application/json");

// Fixed API Key
$apiKey = "12345ABC";

// Check API Key
$headers = getallheaders();

if (!isset($headers['X-API-KEY']) || $headers['X-API-KEY'] != $apiKey) {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Invalid or missing API Key."
    ]);
    exit;
}

// Sample tracks
$tracks = [
    ["id" => 1, "name" => "Blinding Lights", "artist" => "The Weeknd", "duration" => "3:20"],
    ["id" => 2, "name" => "Flowers", "artist" => "Miley Cyrus", "duration" => "3:21"],
    ["id" => 3, "name" => "Espresso", "artist" => "Sabrina Carpenter", "duration" => "2:55"]
];

echo json_encode([
    "status" => "success",
    "tracks" => $tracks
]);
?>