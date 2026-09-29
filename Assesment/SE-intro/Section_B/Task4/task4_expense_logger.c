/*
 * ============================================================================
 * ASSESSMENT FILE: Software Engineering (M3-A1)
 * SECTION B: Practical Coding Tasks
 * TASK 4: Personal Expense Logger
 * ============================================================================
 * Requirements:
 * - Define a struct Expense with fields: category (char[30]) and amount (float).
 * - Allocate an array to store up to 10 Expense entries.
 * - Present a menu with 3 options: (1) Add Expense, (2) View All Expenses, (3) Save & Exit.
 * - In the View option, display all logged expenses and print the running total at the bottom.
 * - On exit (option 3), write all expense records to a file named expenses.txt using fprintf(),
 *   with one record per line in format: category,amount.
 * ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define MAX_EXPENSES 10

/* Definition of Expense Structure */
struct Expense {
    char category[30];
    float amount;
};

/* Function Prototypes */
void addExpense(struct Expense expenses[], int *count);
void viewExpenses(const struct Expense expenses[], int count);
void saveAndExit(const struct Expense expenses[], int count);

int main(void) {
    struct Expense expenses[MAX_EXPENSES];
    int count = 0;
    int choice;

    do {
        printf("\n=========================================\n");
        printf("    TASK 4: PERSONAL EXPENSE LOGGER      \n");
        printf("=========================================\n");
        printf("1. Add Expense\n");
        printf("2. View All Expenses\n");
        printf("3. Save & Exit\n");
        printf("-----------------------------------------\n");
        printf("Enter your choice (1-3): ");

        if (scanf("%d", &choice) != 1) {
            printf("\n[ERROR]: Please enter a valid number (1-3).\n");
            while (getchar() != '\n');
            continue;
        }

        switch (choice) {
            case 1:
                addExpense(expenses, &count);
                break;
            case 2:
                viewExpenses(expenses, count);
                break;
            case 3:
                saveAndExit(expenses, count);
                printf("\nExiting program. Have a nice day!\n");
                break;
            default:
                printf("\n[ERROR]: Invalid choice! Please select 1, 2, or 3.\n");
                break;
        }
    } while (choice != 3);

    return 0;
}

void addExpense(struct Expense expenses[], int *count) {
    if (*count >= MAX_EXPENSES) {
        printf("\n[WARNING]: Expense list is full (Max %d entries reached)!\n", MAX_EXPENSES);
        return;
    }

    printf("\n--- Add Expense (%d of %d) ---\n", *count + 1, MAX_EXPENSES);
    while (getchar() != '\n'); // clear buffer

    printf("Enter Expense Category: ");
    if (fgets(expenses[*count].category, sizeof(expenses[*count].category), stdin) != NULL) {
        size_t len = strlen(expenses[*count].category);
        if (len > 0 && expenses[*count].category[len - 1] == '\n') {
            expenses[*count].category[len - 1] = '\0';
        }
    }

    while (1) {
        printf("Enter Amount ($): ");
        if (scanf("%f", &expenses[*count].amount) == 1 && expenses[*count].amount > 0.0f) {
            break;
        }
        printf("  [ERROR]: Amount must be positive. Please re-enter: ");
        while (getchar() != '\n');
    }

    (*count)++;
    printf("[SUCCESS]: Expense logged successfully!\n");
}

void viewExpenses(const struct Expense expenses[], int count) {
    int i;
    float total = 0.0f;

    printf("\n===================================================\n");
    printf("                  EXPENSE LIST                     \n");
    printf("===================================================\n");

    if (count == 0) {
        printf("  No expenses recorded yet.\n");
        printf("===================================================\n");
        return;
    }

    printf("%-5s | %-25s | %-12s\n", "No.", "Category", "Amount ($)");
    printf("---------------------------------------------------\n");

    for (i = 0; i < count; i++) {
        printf("%-5d | %-25s | $%-11.2f\n", i + 1, expenses[i].category, expenses[i].amount);
        total += expenses[i].amount;
    }

    printf("---------------------------------------------------\n");
    printf("  RUNNING TOTAL: $%.2f\n", total);
    printf("===================================================\n");
}

void saveAndExit(const struct Expense expenses[], int count) {
    FILE *file = fopen("expenses.txt", "w");
    int i;

    if (file == NULL) {
        printf("\n[ERROR]: Failed to open expenses.txt for writing.\n");
        return;
    }

    for (i = 0; i < count; i++) {
        fprintf(file, "%s,%.2f\n", expenses[i].category, expenses[i].amount);
    }

    fclose(file);
    printf("\n[SUCCESS]: %d record(s) saved to 'expenses.txt'.\n", count);
}
