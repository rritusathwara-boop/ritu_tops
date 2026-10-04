#include <stdio.h>

int main() {
    int dailySteps[7] = {6500, 7200, 8100, 5000, 9000, 7600, 8500};

    for (int i = 0; i < 7; i++) {
        printf("Day %d: %d steps\n", i + 1, dailySteps[i]);
    }

    return 0;
}
