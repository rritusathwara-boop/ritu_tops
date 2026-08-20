<?php

// updateOrderStatus.php

header("Content-Type: application/json");

// Allow only PUT requests
if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    http_response_code(405);
    echo json_encode([
        "status" => "error",
        "message" => "Only PUT requests are allowed."
    ]);
    exit;
}

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($data["order_id"])) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "order_id is required."
    ]);
    exit;
}

$order_id = $data["order_id"];

// Simulated updated order
$order = [
    "order_id" => $order_id,
    "status" => "Delivered"
];

// Return updated order
echo json_encode([
    "status" => "success",
    "message" => "Order status updated successfully.",
    "order" => $order
]);

?>