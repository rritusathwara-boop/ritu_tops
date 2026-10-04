#include <stdio.h>
#include <string.h>

#define MAX_TASKS 5

// Global array
char tasks[MAX_TASKS][100];
int taskCount = 0;

int main() {
    int i;

    printf("Enter up to 5 tasks:\n");

    // Add tasks
    for (i = 0; i < MAX_TASKS; i++) {
        printf("Enter task %d: ", i + 1);
        fgets(tasks[i], sizeof(tasks[i]), stdin);

        // Remove newline
        tasks[i][strcspn(tasks[i], "\n")] = '\0';

        taskCount++;
    }

    // Print all tasks
    printf("\n--- Task List ---\n");

    for (i = 0; i < taskCount; i++) {
        printf("%d. %s\n", i + 1, tasks[i]);
    }

    return 0;
}