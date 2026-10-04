#include <stdio.h>

int main() {
    int orders[5] = {250, 450, 180, 700, 320};
    int *ptr = orders;

    for (int i = 0; i < 5; i++) {
        printf("Order amount: Rs. %d | Address: %p\n",
               *(ptr + i), (void *)(ptr + i));
    }

    return 0;
}
