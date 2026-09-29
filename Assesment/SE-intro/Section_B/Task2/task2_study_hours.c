/*
 * ============================================================================
 * ASSESSMENT FILE: Software Engineering (M3-A1)
 * SECTION B: Practical Coding Tasks
 * TASK 2: Weekly Study Hours Analyser
 * ============================================================================
 * Requirements:
 * - Use a for loop to accept 7 float values (one per day) and store them in a float array.
 * - Calculate and print the weekly total, daily average, and day number with the highest study hours.
 * - Print a simple visual bar for each day: day number followed by one asterisk (*) per hour
 *   studied, truncated to the nearest integer (e.g., Day 3: ***).
 * - Reject and re-prompt for any day entry that is negative or greater than 24, before storing it in the array.
 * ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>

#define DAYS 7

int main(void) {
    float hours[DAYS];
    float total = 0.0f;
    float average = 0.0f;
    int max_day_index = 0;
    int i, j;

    printf("==================================================\n");
    printf("     TASK 2: WEEKLY STUDY HOURS ANALYSER          \n");
    printf("==================================================\n");
    printf("Please enter study hours for 7 days (0 to 24 hrs):\n\n");

    /* Accept and validate 7 daily entries */
    for (i = 0; i < DAYS; i++) {
        while (1) {
            printf("Enter study hours for Day %d: ", i + 1);
            if (scanf("%f", &hours[i]) != 1) {
                printf("  [ERROR]: Non-numeric input! Please enter a valid number.\n");
                while (getchar() != '\n');
                continue;
            }

            if (hours[i] < 0.0f || hours[i] > 24.0f) {
                printf("  [ERROR]: Hours (%.2f) must be between 0 and 24. Please re-enter.\n", hours[i]);
            } else {
                break;
            }
        }
    }

    /* Compute total and find day with maximum hours */
    for (i = 0; i < DAYS; i++) {
        total += hours[i];
        if (hours[i] > hours[max_day_index]) {
            max_day_index = i;
        }
    }

    average = total / DAYS;

    /* Display summary */
    printf("\n==================================================\n");
    printf("               PERFORMANCE SUMMARY                \n");
    printf("==================================================\n");
    printf("Weekly Total Study Hours : %.2f hrs\n", total);
    printf("Daily Average Study Hours: %.2f hrs/day\n", average);
    printf("Highest Study Day        : Day %d (%.2f hrs)\n", max_day_index + 1, hours[max_day_index]);

    /* Display visual bar chart */
    printf("\n---------------- Visual Bar Chart ----------------\n");
    for (i = 0; i < DAYS; i++) {
        int stars = (int)hours[i]; // Truncated to nearest integer
        printf("Day %d (%5.2f hrs): ", i + 1, hours[i]);
        for (j = 0; j < stars; j++) {
            printf("*");
        }
        if (stars == 0) {
            printf("(0 hrs)");
        }
        printf("\n");
    }
    printf("==================================================\n");

    return 0;
}
