<?php

header("Content-Type: application/json");

// Check for fail=true
if (isset($_GET["fail"]) && $_GET["fail"] == "true") {
    http_response_code(404);
    echo json_encode([
        "error" => "Movies not found"
    ]);
    exit();
}

// Movies Array
$movies = [
    ["id" => 1, "title" => "3 Idiots", "genre" => "Comedy"],
    ["id" => 2, "title" => "KGF", "genre" => "Action"],
    ["id" => 3, "title" => "Dangal", "genre" => "Sports"],
    ["id" => 4, "title" => "Bahubali", "genre" => "Action"],
    ["id" => 5, "title" => "Drishyam", "genre" => "Thriller"]
];

// Return Movies
echo json_encode($movies);

?>