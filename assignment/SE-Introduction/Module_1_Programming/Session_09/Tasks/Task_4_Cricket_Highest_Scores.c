#include <stdio.h>

int main() {
    int cricketScores[4][2] = {
        {180, 165},
        {145, 172},
        {210, 190},
        {155, 160}
    };

    for (int match = 0; match < 4; match++) {
        int highest = cricketScores[match][0];

        for (int team = 1; team < 2; team++) {
            if (cricketScores[match][team] > highest) {
                highest = cricketScores[match][team];
            }
        }

        printf("Match %d highest score: %d\n", match + 1, highest);
    }

    return 0;
}
