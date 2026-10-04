#include <stdio.h>

int main() {
    const float GST_RATE = 18.0f;
    float basePrice = 500.0f;
    float gst = basePrice * GST_RATE / 100;
    float finalPrice = basePrice + gst;

    printf("Base Price: Rs. %.2f\n", basePrice);
    printf("GST Rate: %.2f%%\n", GST_RATE);
    printf("GST Amount: Rs. %.2f\n", gst);
    printf("Final Price: Rs. %.2f\n", finalPrice);

    return 0;
}
