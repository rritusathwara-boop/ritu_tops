<?php

// Set the response type to JSON
header("Content-Type: application/json");

// Check if the 'genre' parameter is provided
if (!isset($_GET['genre']) || empty($_GET['genre'])) {
    http_response_code(400);
    echo json_encode([
        "error" => "The 'genre' parameter is required."
    ]);
    exit;
}

$genre = $_GET['genre'];

// Sample list of trending songs
$topSongs = [
    "Blinding Lights",
    "Flowers",
    "Espresso",
    "Lose Control",
    "Beautiful Things"
];

// Return the response
echo json_encode([
    "genre" => $genre,
    "songs" => $topSongs
]);

?>