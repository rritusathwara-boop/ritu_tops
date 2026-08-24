<?php

header("Content-Type: application/json");

// ----------------------
// Simple Rate Limiting
// ----------------------
$ip = $_SERVER['REMOTE_ADDR'];
$file = "rate_limit_" . md5($ip) . ".txt";

$limit = 3;          // Maximum requests
$timeWindow = 60;    // 1 minute

$currentTime = time();

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);

    // Reset counter if time window has expired
    if (($currentTime - $data['start_time']) > $timeWindow) {
        $data = [
            "count" => 1,
            "start_time" => $currentTime
        ];
    } else {
        $data['count']++;

        if ($data['count'] > $limit) {
            http_response_code(429);
            echo json_encode([
                "error" => "Rate limit exceeded. Please try again after 1 minute."
            ]);
            exit;
        }
    }
} else {
    $data = [
        "count" => 1,
        "start_time" => $currentTime
    ];
}

// Save updated request data
file_put_contents($file, json_encode($data));

// ----------------------
// Validate genre
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

// Successful response
echo json_encode([
    "genre" => $genre,
    "songs" => $topSongs
]);

?>