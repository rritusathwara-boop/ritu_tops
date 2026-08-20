<?php

header("Content-Type: application/json");

// ----------------------
// Allow HTTPS Only
// ----------------------
if (
    !isset($_SERVER['HTTPS']) ||
    $_SERVER['HTTPS'] !== 'on'
) {
    http_response_code(403);
    echo json_encode([
        "error" => "Access denied. HTTPS is required."
    ]);
    exit;
}

// ----------------------
// Check required parameter
// ----------------------
if (!isset($_GET['genre']) || empty($_GET['genre'])) {
    http_response_code(400);
    echo json_encode([
        "error" => "The 'genre' parameter is required."
    ]);
    exit;
}

$genre = $_GET['genre'];

// Sample trending songs
$topSongs = [
    "Blinding Lights",
    "Flowers",
    "Espresso",
    "Lose Control",
    "Beautiful Things"
];

// Return JSON response
echo json_encode([
    "genre" => $genre,
    "songs" => $topSongs
]);

?>