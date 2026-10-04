function formatPrice(price) {
    return "₹" + price.toLocaleString("en-IN");
}

console.log(formatPrice(1599));
console.log(formatPrice(24999));
console.log(formatPrice(750));
