#include <stdio.h>
#include <string.h>

#define DAYS 7
#define FILE_NAME "music_log.txt"

void loadData(int minutes[]) {
    FILE *file = fopen(FILE_NAME, "r");

    if (file == NULL) {
        for (int i = 0; i < DAYS; i++) {
            minutes[i] = 0;
        }
        return;
    }

    for (int i = 0; i < DAYS; i++) {
        if (fscanf(file, "%d", &minutes[i]) != 1) {
            minutes[i] = 0;
        }
    }

    fclose(file);
}

void saveData(int minutes[]) {
    FILE *file = fopen(FILE_NAME, "w");

    if (file == NULL) {
        printf("Unable to open music_log.txt.\n");
        return;
    }

    for (int i = 0; i < DAYS; i++) {
        fprintf(file, "%d\n", minutes[i]);
    }

    fclose(file);
}

void logMinutes(int minutes[]) {
    int day, value;

    printf("Enter day number (1-7): ");
    scanf("%d", &day);

    if (day < 1 || day > 7) {
        printf("Invalid day.\n");
        return;
    }

    printf("Enter listening minutes for day %d: ", day);
    scanf("%d", &value);

    if (value < 0) {
        printf("Minutes cannot be negative.\n");
        return;
    }

    minutes[day - 1] = value;
    saveData(minutes);

    printf("Listening data saved.\n");
}

void showReport(int minutes[]) {
    int total = 0;
    int highest = minutes[0];

    for (int i = 0; i < DAYS; i++) {
        total += minutes[i];

        if (minutes[i] > highest) {
            highest = minutes[i];
        }
    }

    printf("\nWeekly Report\n");
    printf("-------------\n");

    for (int i = 0; i < DAYS; i++) {
        printf("Day %d: %d minutes\n", i + 1, minutes[i]);
    }

    printf("Total: %d minutes\n", total);
    printf("Average: %.2f minutes\n", total / 7.0);
    printf("Highest: %d minutes\n", highest);
}

void resetData(int minutes[]) {
    char confirm;

    printf("Are you sure you want to reset weekly data? (y/n): ");
    scanf(" %c", &confirm);

    if (confirm == 'y' || confirm == 'Y') {
        for (int i = 0; i < DAYS; i++) {
            minutes[i] = 0;
        }

        // Opening in "w" clears the existing file contents.
        FILE *file = fopen(FILE_NAME, "w");

        if (file != NULL) {
            fclose(file);
        }

        printf("Weekly data reset successfully.\n");
    } else {
        printf("Reset cancelled.\n");
    }
}

int main() {
    int minutes[DAYS];
    int choice;

    loadData(minutes);

    do {
        printf("\n===== Music Listening Logger =====\n");
        printf("1. Log listening minutes\n");
        printf("2. View weekly summary\n");
        printf("3. Reset weekly data\n");
        printf("4. Exit\n");
        printf("Enter choice: ");
        scanf("%d", &choice);

        switch (choice) {
        case 1:
            logMinutes(minutes);
            break;

        case 2:
            showReport(minutes);
            break;

        case 3:
            resetData(minutes);
            break;

        case 4:
            printf("Thank you for using Music Listening Logger.\n");
            break;

        default:
            printf("Invalid choice.\n");
        }

    } while (choice != 4);

    return 0;
}
