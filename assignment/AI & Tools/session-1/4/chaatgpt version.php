function searchProducts($products, $keyword) {
    return array_filter($products, function ($product) use ($keyword) {
        return stripos($product['name'], $keyword) !== false;
    });
}