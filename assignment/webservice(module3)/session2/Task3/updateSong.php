<?php

header("Content-Type: application/json");

// Database Connection
$conn = mysqli_connect("localhost", "root", "", "music_db");

if (!$conn) {
    die(json_encode(["message" => "Connection Failed"]));
}

// Read JSON data
$data = json_decode(file_get_contents("php://input"), true);

$id = $data["id"];
$title = $data["title"];
$duration = $data["duration"];

// Update Query
$sql = "UPDATE songs SET title='$title', duration='$duration' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Song Updated Successfully"]);
} else {
    echo json_encode(["message" => "Update Failed"]);
}

mysqli_close($conn);

?>