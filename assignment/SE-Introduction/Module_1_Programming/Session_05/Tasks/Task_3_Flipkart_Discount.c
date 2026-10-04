#include <stdio.h>

int main() {
    float amount, discount = 0, finalAmount;

    printf("Enter total cart amount: ");
    scanf("%f", &amount);

    if (amount > 0) {
        if (amount > 2000) {
            discount = amount * 20 / 100;
        } else {
            if (amount > 1000) {
                discount = amount * 10 / 100;
            } else {
                discount = 0;
            }
        }
    }

    finalAmount = amount - discount;

    printf("Discount: Rs. %.2f\n", discount);
    printf("Final Amount: Rs. %.2f\n", finalAmount);

    return 0;
}
