<?php

header("Content-Type: application/json");

// Basic Authentication
$username = $_SERVER['PHP_AUTH_USER'] ?? '';
$password = $_SERVER['PHP_AUTH_PW'] ?? '';

if ($username != "musicfan" || $password != "topstraining") {
    http_response_code(401);
    echo json_encode([
        "message" => "Unauthorized"
    ]);
    exit();
}

// Hardcoded Playlists
$playlists = [
    [
        "id" => 1,
        "name" => "Top Hits",
        "songs" => 25
    ],
    [
        "id" => 2,
        "name" => "Workout Mix",
        "songs" => 18
    ],
    [
        "id" => 3,
        "name" => "Chill Vibes",
        "songs" => 30
    ]
];

// Return JSON
echo json_encode($playlists);

?>