<?php

header("Content-Type: application/json");

// Get JSON data
$data = json_decode(file_get_contents("php://input"), true);

// Check mobile number
if(!isset($data['mobile']) || empty($data['mobile']))
{
    http_response_code(400);

    echo json_encode([
        "status" => false,
        "message" => "Mobile number is required"
    ]);

    exit;
}

// Generate OTP
$otp = rand(100000, 999999);

// Here you can integrate Twilio SMS API
// SMS sending code goes here

echo json_encode([
    "status" => true,
    "message" => "OTP sent successfully",
    "otp" => $otp
]);

?>