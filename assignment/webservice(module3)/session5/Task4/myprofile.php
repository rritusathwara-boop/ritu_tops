<?php

header("Content-Type: application/json");

// Expected JWT Token
$validToken = "YOUR_JWT_TOKEN";

// Get Authorization Header
$headers = getallheaders();
$authHeader = $headers["Authorization"] ?? "";

// Check Token
if ($authHeader != "Bearer " . $validToken) {
    http_response_code(401);
    echo json_encode([
        "success" => false,
        "message" => "Unauthorized"
    ]);
    exit();
}

// Mock Instagram-style Profile
$profile = [
    "username" => "ritu123",
    "followers" => 2500,
    "posts" => 120
];

// Success Response
echo json_encode([
    "success" => true,
    "data" => $profile
]);

?>