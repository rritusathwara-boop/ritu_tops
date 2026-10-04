#include <stdio.h>

int main() {
    float playlistRatings[3][5] = {
        {4.5, 4.2, 4.7, 4.6, 4.8},
        {4.0, 4.3, 4.1, 4.5, 4.4},
        {3.9, 4.0, 4.2, 4.1, 4.3}
    };

    printf("Ratings for second playlist:\n");

    for (int day = 0; day < 5; day++) {
        printf("Day %d: %.1f\n", day + 1, playlistRatings[1][day]);
    }

    return 0;
}
