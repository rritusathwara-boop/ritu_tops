<?php

// deleteWishlist.php

header("Content-Type: application/json");

// Allow only DELETE requests
if ($_SERVER["REQUEST_METHOD"] != "DELETE") {
    http_response_code(405);
    echo json_encode([
        "status" => "error",
        "message" => "Only DELETE requests are allowed."
    ]);
    exit;
}

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($data["wishlist_id"])) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "wishlist_id is required."
    ]);
    exit;
}

$wishlist_id = $data["wishlist_id"];

// Simulate deleting the wishlist item
$deletedItem = [
    "wishlist_id" => $wishlist_id
];

// Return success response
echo json_encode([
    "status" => "success",
    "message" => "Wishlist item deleted successfully.",
    "deleted_item" => $deletedItem
]);
?>