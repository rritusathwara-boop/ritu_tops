#include <stdio.h>
#include <string.h>

int main() {
    char username1[50];
    char username2[50];

    printf("Enter first username: ");
    scanf("%49s", username1);

    printf("Enter second username: ");
    scanf("%49s", username2);

    if (strcmp(username1, username2) == 0) {
        printf("Usernames are the same.\n");
    } else {
        printf("Usernames are different.\n");
    }

    return 0;
}
