#include <stdio.h>

int main() {
    char productName[] = "Wireless Headphones";
    float price = 1499.50f;
    double rating = 4.5;

    printf("Product Name: %s (string)\n", productName);
    printf("Price: %.2f (float)\n", price);
    printf("Rating: %.1f (double)\n", rating);

    return 0;
}
