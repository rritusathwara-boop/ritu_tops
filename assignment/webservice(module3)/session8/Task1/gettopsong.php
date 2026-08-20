<?php

// Set the response type to JSON
header("Content-Type: application/json");

// Array of 5 trending songs
$topSongs = [
    "Blinding Lights",
    "Flowers",
    "Espresso",
    "Lose Control",
    "Beautiful Things"
];

// Return the JSON response
echo json_encode($topSongs);

?>