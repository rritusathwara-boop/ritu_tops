#include <stdio.h>

void incrementFollowers(int *followers, int n) {
    for (int i = 0; i < n; i++) {
        *(followers + i) += 100;
    }
}

int main() {
    int followers[5] = {1000, 2500, 3200, 1800, 4500};

    incrementFollowers(followers, 5);

    for (int i = 0; i < 5; i++) {
        printf("Friend %d followers: %d\n", i + 1, followers[i]);
    }

    return 0;
}
