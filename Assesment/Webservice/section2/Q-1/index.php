<?php
header("Content-Type: application/json");
include "db.php";

$method = $_SERVER['REQUEST_METHOD'];

$request = explode('/', trim($_SERVER['PATH_INFO'] ?? '', '/'));

$id = isset($request[1]) ? $request[1] : null;

switch($method){

// GET /products
case "GET":

    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

break;


// POST /products
case "POST":

    $data = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("INSERT INTO products(name,price,quantity) VALUES(?,?,?)");

    $stmt->execute([
        $data['name'],
        $data['price'],
        $data['quantity']
    ]);

    echo json_encode([
        "message"=>"Product Added Successfully"
    ]);

break;


// PUT /products/{id}
case "PUT":

    if(!$id){
        echo json_encode(["message"=>"Product ID Required"]);
        exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("UPDATE products SET name=?, price=?, quantity=? WHERE id=?");

    $stmt->execute([
        $data['name'],
        $data['price'],
        $data['quantity'],
        $id
    ]);

    echo json_encode([
        "message"=>"Product Updated Successfully"
    ]);

break;


// DELETE /products/{id}
case "DELETE":

    if(!$id){
        echo json_encode(["message"=>"Product ID Required"]);
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");

    $stmt->execute([$id]);

    echo json_encode([
        "message"=>"Product Deleted Successfully"
    ]);

break;

default:

    echo json_encode([
        "message"=>"Invalid Request"
    ]);
}
?>