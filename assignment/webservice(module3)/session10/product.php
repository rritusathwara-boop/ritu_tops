<?php

header("Content-Type: application/json");

$products = [
    1 => ["id"=>1, "name"=>"iPhone 15", "price"=>80000],
    2 => ["id"=>2, "name"=>"Samsung S23", "price"=>70000]
];

$id = $_GET['id'] ?? null;

if(isset($products[$id]))
{
    echo json_encode($products[$id]);
}
else
{
    http_response_code(404);

    echo json_encode([
        "status" => false,
        "error" => "Product not found"
    ]);
}

?>