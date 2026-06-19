<?php

header("Content-Type: application/json");

$movies = [
    ["id" => 1, "title" => "KGF", "language" => "Kannada"],
    ["id" => 2, "title" => "3 Idiots", "language" => "Hindi"]
];

$method = $_SERVER['REQUEST_METHOD'];

// GET - Get Movies
if ($method == "GET") {
    echo json_encode($movies);
}

// POST - Add Movie
else if ($method == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $newMovie = [
        "id" => count($movies) + 1,
        "title" => $data["title"],
        "language" => $data["language"]
    ];

    $movies[] = $newMovie;

    http_response_code(201);

    echo json_encode([
        "message" => "Movie Added Successfully",
        "movie" => $newMovie
    ]);
}

else {
    http_response_code(405);
    echo json_encode([
        "message" => "Method Not Allowed"
    ]);
}
?>