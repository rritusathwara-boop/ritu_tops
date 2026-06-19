<?php

// getAllTracks.php

header("Content-Type: application/json");

// Sample music tracks
$tracks = [
    [
        "id" => 1,
        "name" => "Blinding Lights",
        "artist" => "The Weeknd",
        "duration" => "3:20"
    ],
    [
        "id" => 2,
        "name" => "Flowers",
        "artist" => "Miley Cyrus",
        "duration" => "3:21"
    ],
    [
        "id" => 3,
        "name" => "Espresso",
        "artist" => "Sabrina Carpenter",
        "duration" => "2:55"
    ],
    [
        "id" => 4,
        "name" => "Lose Control",
        "artist" => "Teddy Swims",
        "duration" => "3:30"
    ],
    [
        "id" => 5,
        "name" => "Beautiful Things",
        "artist" => "Benson Boone",
        "duration" => "3:00"
    ]
];

// Return JSON response
echo json_encode([
    "status" => "success",
    "tracks" => $tracks
], JSON_PRETTY_PRINT);

?>