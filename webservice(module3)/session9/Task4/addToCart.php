<?php

session_start();

header("Content-Type: application/json");

// Fixed API Key
$apiKey = "12345ABC";

// Check API Key
$headers = getallheaders();

if (!isset($headers['X-API-KEY']) || $headers['X-API-KEY'] != $apiKey) {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Invalid or missing API Key."
    ]);
    exit;
}

// Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    echo json_encode([
        "status" => "error",
        "message" => "Only POST requests are allowed."
    ]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["product_id"]) || !isset($data["quantity"])) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "product_id and quantity are required."
    ]);
    exit;
}

$_SESSION["cart"][] = [
    "product_id" => $data["product_id"],
    "quantity" => $data["quantity"]
];

echo json_encode([
    "status" => "success",
    "message" => "Product added to cart successfully.",
    "cart" => $_SESSION["cart"]
]);
?>