#include <stdio.h>

float averageSpend(int orders[], int size) {
    int sum = 0;

    for (int i = 0; i < size; i++) {
        sum += orders[i];
    }

    return (float)sum / size;
}

int main() {
    int orders[7] = {250, 320, 180, 450, 300, 220, 500};

    printf("Average weekly spend: Rs. %.2f\n",
           averageSpend(orders, 7));

    return 0;
}
