<?php

header("Content-Type: application/json");

// Check API Key
$api_key = $_GET["api_key"] ?? "";

if ($api_key != "MYSECRET123") {
    header("HTTP/1.1 401 Unauthorized");
    echo json_encode([
        "message" => "Invalid API Key"
    ]);
    exit();
}

// Mock Orders
$orders = [
    [
        "id" => 1,
        "customer" => "Rahul",
        "item" => "Pizza",
        "amount" => 350
    ],
    [
        "id" => 2,
        "customer" => "Priya",
        "item" => "Burger",
        "amount" => 180
    ],
    [
        "id" => 3,
        "customer" => "Amit",
        "item" => "Biryani",
        "amount" => 250
    ]
];

// Return Orders
echo json_encode($orders);

?>