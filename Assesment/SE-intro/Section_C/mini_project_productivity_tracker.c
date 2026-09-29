/*
 * ============================================================================
 * ASSESSMENT FILE: Software Engineering (M3-A1)
 * SECTION C: Mini Capstone Project
 * PROJECT: Student Productivity Tracker
 * ============================================================================
 * Requirements:
 * - Menu-driven with at least 3 options:
 *   (1) Log Today's Study Hours
 *   (2) View Weekly Report
 *   (3) Save & Exit
 * - Define struct StudyLog { char subject[40]; float hours[7]; } with at least 3 subjects.
 * - Function that calculates and displays weekly total hours and daily average for each subject.
 * - Display a simple text-based progress chart: for each subject, print one filled dot (*)
 *   per hour studied that day (truncated to nearest integer).
 * - On exit, save all records to "productivity_log.txt" using fprintf(), with each subject's
 *   name and 7 daily values written as a single comma-separated line.
 * ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define NUM_SUBJECTS 3
#define DAYS_PER_WEEK 7

/* Structure Definition */
struct StudyLog {
    char subject[40];
    float hours[DAYS_PER_WEEK];
};

const char *DAY_NAMES[DAYS_PER_WEEK] = {
    "Day 1 (Mon)", "Day 2 (Tue)", "Day 3 (Wed)",
    "Day 4 (Thu)", "Day 5 (Fri)", "Day 6 (Sat)", "Day 7 (Sun)"
};

/* Function Prototypes */
void initializeSubjects(struct StudyLog logs[], int n);
void logTodayHours(struct StudyLog logs[], int n);
void viewWeeklyReport(const struct StudyLog logs[], int n);
void displayProgressChart(const struct StudyLog logs[], int n);
void saveAndExit(const struct StudyLog logs[], int n);

int main(void) {
    struct StudyLog subjects[NUM_SUBJECTS];
    int choice;

    initializeSubjects(subjects, NUM_SUBJECTS);

    do {
        printf("\n=======================================================\n");
        printf("     SECTION C: STUDENT PRODUCTIVITY TRACKER           \n");
        printf("=======================================================\n");
        printf("1. Log Today's Study Hours\n");
        printf("2. View Weekly Report & Progress Chart\n");
        printf("3. Save & Exit\n");
        printf("-------------------------------------------------------\n");
        printf("Enter option (1-3): ");

        if (scanf("%d", &choice) != 1) {
            printf("\n[ERROR]: Please enter a number (1-3).\n");
            while (getchar() != '\n');
            continue;
        }

        switch (choice) {
            case 1:
                logTodayHours(subjects, NUM_SUBJECTS);
                break;
            case 2:
                viewWeeklyReport(subjects, NUM_SUBJECTS);
                break;
            case 3:
                saveAndExit(subjects, NUM_SUBJECTS);
                printf("\nExiting. Keep learning!\n");
                break;
            default:
                printf("\n[ERROR]: Invalid choice! Please select 1, 2, or 3.\n");
                break;
        }
    } while (choice != 3);

    return 0;
}

void initializeSubjects(struct StudyLog logs[], int n) {
    const char *names[NUM_SUBJECTS] = {
        "C Programming",
        "Web Development",
        "Database Management"
    };

    int i, d;
    for (i = 0; i < n; i++) {
        strncpy(logs[i].subject, names[i], sizeof(logs[i].subject) - 1);
        logs[i].subject[sizeof(logs[i].subject) - 1] = '\0';
        for (d = 0; d < DAYS_PER_WEEK; d++) {
            logs[i].hours[d] = 0.0f;
        }
    }
}

void logTodayHours(struct StudyLog logs[], int n) {
    int day_num, i;

    printf("\n--- Select Day to Log Hours ---\n");
    for (i = 0; i < DAYS_PER_WEEK; i++) {
        printf("%d. %s\n", i + 1, DAY_NAMES[i]);
    }
    printf("Enter day number (1-7): ");
    if (scanf("%d", &day_num) != 1 || day_num < 1 || day_num > 7) {
        printf("[ERROR]: Invalid day selected. Returning to menu.\n");
        while (getchar() != '\n');
        return;
    }

    int day_idx = day_num - 1;
    printf("\nEntering hours for %s:\n", DAY_NAMES[day_idx]);

    for (i = 0; i < n; i++) {
        float val;
        while (1) {
            printf("  Hours for '%s' (0 - 24): ", logs[i].subject);
            if (scanf("%f", &val) == 1 && val >= 0.0f && val <= 24.0f) {
                logs[i].hours[day_idx] = val;
                break;
            }
            printf("    [ERROR]: Enter hours between 0 and 24.\n");
            while (getchar() != '\n');
        }
    }
    printf("[SUCCESS]: Hours recorded successfully for %s!\n", DAY_NAMES[day_idx]);
}

void viewWeeklyReport(const struct StudyLog logs[], int n) {
    int i, d;
    float grand_total = 0.0f;

    printf("\n=======================================================================\n");
    printf("                    WEEKLY STUDY PERFORMANCE REPORT                   \n");
    printf("=======================================================================\n");
    printf("%-25s | %-12s | %-12s\n", "Subject", "Weekly Total", "Daily Avg");
    printf("-----------------------------------------------------------------------\n");

    for (i = 0; i < n; i++) {
        float subject_total = 0.0f;
        for (d = 0; d < DAYS_PER_WEEK; d++) {
            subject_total += logs[i].hours[d];
        }
        float daily_avg = subject_total / DAYS_PER_WEEK;
        grand_total += subject_total;

        printf("%-25s | %8.2f hrs | %8.2f hrs/d\n", logs[i].subject, subject_total, daily_avg);
    }
    printf("-----------------------------------------------------------------------\n");
    printf("TOTAL STUDY HOURS: %.2f hrs\n", grand_total);
    printf("=======================================================================\n");

    displayProgressChart(logs, n);
}

void displayProgressChart(const struct StudyLog logs[], int n) {
    int i, d, h;
    printf("\n=======================================================================\n");
    printf("                   TEXT-BASED PROGRESS CHART (* = 1 hr)                \n");
    printf("=======================================================================\n");

    for (i = 0; i < n; i++) {
        printf("\nSubject: %s\n", logs[i].subject);
        printf("-----------------------------------------------------------------------\n");
        for (d = 0; d < DAYS_PER_WEEK; d++) {
            int stars = (int)(logs[i].hours[d]); // Truncated to nearest integer
            printf("  %-13s [%4.1f hrs]: ", DAY_NAMES[d], logs[i].hours[d]);
            if (stars == 0) {
                printf("-");
            } else {
                for (h = 0; h < stars; h++) {
                    printf("*");
                }
            }
            printf("\n");
        }
    }
    printf("=======================================================================\n");
}

void saveAndExit(const struct StudyLog logs[], int n) {
    FILE *fp = fopen("productivity_log.txt", "w");
    int i, d;

    if (fp == NULL) {
        printf("\n[ERROR]: Could not open 'productivity_log.txt' for writing.\n");
        return;
    }

    for (i = 0; i < n; i++) {
        fprintf(fp, "%s", logs[i].subject);
        for (d = 0; d < DAYS_PER_WEEK; d++) {
            fprintf(fp, ",%.2f", logs[i].hours[d]);
        }
        fprintf(fp, "\n");
    }

    fclose(fp);
    printf("\n[SUCCESS]: Data saved to 'productivity_log.txt'.\n");
}
