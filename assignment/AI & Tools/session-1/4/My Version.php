function searchProducts($products, $keyword) {
    $results = [];

    foreach ($products as $product) {
        if (stripos($product['name'], $keyword) !== false) {
            $results[] = $product;
        }
    }

    return $results;
}