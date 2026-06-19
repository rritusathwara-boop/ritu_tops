<?php

// Replace with your OpenWeatherMap API Key
$apiKey = "YOUR_API_KEY";
$city = "Ahmedabad";

// API URL
$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

// Fetch data
$response = @file_get_contents($url);

// Check if API call failed
if ($response === FALSE) {
    echo "<h3>Unable to fetch weather data. Please try again later.</h3>";
    exit;
}

// Decode JSON
$data = json_decode($response, true);

// Check if JSON is valid and required keys exist
if (
    empty($data) ||
    !isset($data["main"]["temp"]) ||
    !isset($data["weather"][0]["description"])
) {
    echo "<h3>Weather information is currently unavailable.</h3>";
    exit;
}

// Display Weather
echo "<h2>Weather Report</h2>";
echo "City: " . $city . "<br>";
echo "Temperature: " . $data["main"]["temp"] . " °C<br>";
echo "Condition: " . ucfirst($data["weather"][0]["description"]);

?>