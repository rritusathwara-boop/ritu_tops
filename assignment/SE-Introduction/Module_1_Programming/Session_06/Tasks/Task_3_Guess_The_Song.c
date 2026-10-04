#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <time.h>

int main() {
    char songs[3][50] = {"Perfect", "Believer", "Faded"};
    char guess[50];
    int randomIndex;

    srand((unsigned int)time(NULL));
    randomIndex = rand() % 3;

    do {
        printf("Guess the song: ");
        scanf(" %49[^\n]", guess);

        if (strcmp(guess, songs[randomIndex]) == 0) {
            printf("Correct! You guessed it.\n");
            break;
        } else {
            printf("Wrong guess. Try again.\n");
        }
    } while (1);

    return 0;
}
