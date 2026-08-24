<?php

header("Content-Type: application/json");

$movies = [
    [
        "id" => 1,
        "title" => "3 Idiots",
        "genre" => "Comedy"
    ],
    [
        "id" => 2,
        "title" => "KGF",
        "genre" => "Action"
    ],
    [
        "id" => 3,
        "title" => "Dangal",
        "genre" => "Sports"
    ],
    [
        "id" => 4,
        "title" => "Bahubali",
        "genre" => "Action"
    ],
    [
        "id" => 5,
        "title" => "Drishyam",
        "genre" => "Thriller"
    ]
];

echo json_encode($movies);

?>