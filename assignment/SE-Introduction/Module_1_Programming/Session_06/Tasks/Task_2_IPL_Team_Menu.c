#include <stdio.h>
#include <string.h>

int main() {
    char teams[4][50] = {"Mumbai Indians", "CSK", "RCB"};
    int count = 3;
    int choice;

    while (1) {
        printf("\n1. View favorite 3 IPL teams\n");
        printf("2. Add a new team\n");
        printf("3. Exit\n");
        printf("Enter choice: ");
        scanf("%d", &choice);

        if (choice == 1) {
            for (int i = 0; i < count; i++) {
                printf("%d. %s\n", i + 1, teams[i]);
            }
        } else if (choice == 2) {
            if (count < 4) {
                printf("Enter new team: ");
                scanf(" %49[^\n]", teams[count]);
                count++;
                printf("Team added.\n");
            } else {
                printf("Maximum 4 teams supported in this simple example.\n");
            }
        } else if (choice == 3) {
            printf("Goodbye!\n");
            break;
        } else {
            printf("Invalid choice.\n");
        }
    }

    return 0;
}
