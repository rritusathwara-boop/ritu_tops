/*
 * ============================================================================
 * ASSESSMENT FILE: Software Engineering (M3-A1)
 * SECTION B: Practical Coding Tasks
 * TASK 1: Grade Band Checker
 * ============================================================================
 * Requirements:
 * - Accept a float percentage value as user input using scanf().
 * - Assign a grade using if-else if: A (>= 90), B (>= 75), C (>= 60), D (>= 45), F (below 45).
 * - Print the assigned grade and a one-line motivational message for each band.
 * - Handle invalid input: if the score is outside 0-100, print a clear error message
 *   and exit the program gracefully.
 * ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>

int main(void) {
    float percentage;

    printf("=========================================\n");
    printf("        TASK 1: GRADE BAND CHECKER       \n");
    printf("=========================================\n");

    printf("Enter student percentage score (0 - 100): ");
    if (scanf("%f", &percentage) != 1) {
        printf("\n[ERROR]: Invalid input! Please enter a numerical score.\n");
        return 1;
    }

    /* Range validation check (0 to 100) */
    if (percentage < 0.0f || percentage > 100.0f) {
        printf("\n[ERROR]: Score %.2f is out of bounds! Percentage must be between 0 and 100.\n", percentage);
        printf("Exiting program gracefully.\n");
        return 1;
    }

    printf("\n--------------- RESULT ------------------\n");
    printf("Percentage Score : %.2f%%\n", percentage);

    /* Grade classification using if-else if */
    if (percentage >= 90.0f) {
        printf("Assigned Grade   : A\n");
        printf("Message          : 'A — Outstanding performance! Keep up the brilliant work.'\n");
    } else if (percentage >= 75.0f) {
        printf("Assigned Grade   : B\n");
        printf("Message          : 'B — Good work! Keep pushing for excellence.'\n");
    } else if (percentage >= 60.0f) {
        printf("Assigned Grade   : C\n");
        printf("Message          : 'C — Satisfactory effort. You have great potential to improve.'\n");
    } else if (percentage >= 45.0f) {
        printf("Assigned Grade   : D\n");
        printf("Message          : 'D — Needs improvement. Put in more dedicated study hours.'\n");
    } else {
        printf("Assigned Grade   : F\n");
        printf("Message          : 'F — Below passing criteria. Focus on fundamentals and retry!'\n");
    }

    printf("=========================================\n");

    return 0;
}
