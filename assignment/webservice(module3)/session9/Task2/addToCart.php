<?php

// addToCart.php

session_start();

header("Content-Type: application/json");

// Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    echo json_encode([
        "status" => "error",
        "message" => "Only POST requests are allowed."
    ]);
    exit;
}

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($data["product_id"]) || !isset($data["quantity"])) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "product_id and quantity are required."
    ]);
    exit;
}

$product_id = $data["product_id"];
$quantity = $data["quantity"];

// Create cart if it doesn't exist
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Add product to cart
$_SESSION["cart"][] = [
    "product_id" => $product_id,
    "quantity" => $quantity
];

// Return success response
echo json_encode([
    "status" => "success",
    "message" => "Product added to cart successfully.",
    "cart" => $_SESSION["cart"]
]);

?>