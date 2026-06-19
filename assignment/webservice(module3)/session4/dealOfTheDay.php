<?php

// Fetch products from DummyJSON API
$url = "https://dummyjson.com/products";

$response = file_get_contents($url);
$data = json_decode($response, true);

// Get a random product
$products = $data["products"];
$random = $products[array_rand($products)];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Deal of the Day</title>
</head>
<body>

<h2>🛒 Flipkart Deal of the Day</h2>

<div style="width:300px;border:1px solid #ccc;padding:15px;text-align:center;">
    
    <img src="<?php echo $random['thumbnail']; ?>" width="200"><br><br>

    <h3><?php echo $random['title']; ?></h3>

    <p><strong>Price: ₹<?php echo $random['price']; ?></strong></p>

</div>

</body>
</html>