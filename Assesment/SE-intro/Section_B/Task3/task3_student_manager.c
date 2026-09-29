/*
 * ============================================================================
 * ASSESSMENT FILE: Software Engineering (M3-A1)
 * SECTION B: Practical Coding Tasks
 * TASK 3: Student Record Manager
 * ============================================================================
 * Requirements:
 * - Define a struct Student with fields: name (char[50]), rollno (int), marks (float), and grade (char).
 * - Write a function void assignGrade(struct Student *s) that sets the grade field based on
 *   the marks value using the same bands as Task 1.
 * - In main(), accept data for 3 students, call assignGrade() for each, and display all records
 *   in a formatted table with column headers.
 * - Write a separate function void printTopper(struct Student students[], int n) that prints the
 *   name and marks of the student with the highest marks.
 * ============================================================================
 */

#include <stdio.h>
#include <string.h>

#define NUM_STUDENTS 3

/* Definition of Student Structure */
struct Student {
    char name[50];
    int rollno;
    float marks;
    char grade;
};

/* Function: assignGrade (using pointer dereferencing) */
void assignGrade(struct Student *s) {
    if (s->marks >= 90.0f) {
        s->grade = 'A';
    } else if (s->marks >= 75.0f) {
        s->grade = 'B';
    } else if (s->marks >= 60.0f) {
        s->grade = 'C';
    } else if (s->marks >= 45.0f) {
        s->grade = 'D';
    } else {
        s->grade = 'F';
    }
}

/* Function: printTopper (finds highest scoring student) */
void printTopper(struct Student students[], int n) {
    if (n <= 0) return;

    int topper_idx = 0;
    int i;
    for (i = 1; i < n; i++) {
        if (students[i].marks > students[topper_idx].marks) {
            topper_idx = i;
        }
    }

    printf("\n===============================================================\n");
    printf("                       CLASS TOPPER                            \n");
    printf("===============================================================\n");
    printf("  Topper Name  : %s\n", students[topper_idx].name);
    printf("  Roll Number  : %d\n", students[topper_idx].rollno);
    printf("  Marks Scored : %.2f / 100 (Grade %c)\n", students[topper_idx].marks, students[topper_idx].grade);
    printf("===============================================================\n");
}

int main(void) {
    struct Student students[NUM_STUDENTS];
    int i;

    printf("===============================================================\n");
    printf("          TASK 3: STUDENT RECORD MANAGER (STRUCTS)             \n");
    printf("===============================================================\n");
    printf("Enter details for %d students:\n\n", NUM_STUDENTS);

    for (i = 0; i < NUM_STUDENTS; i++) {
        printf("--- Student %d ---\n", i + 1);

        printf("Enter Roll Number: ");
        scanf("%d", &students[i].rollno);
        while (getchar() != '\n'); // clear buffer

        printf("Enter Name: ");
        if (fgets(students[i].name, sizeof(students[i].name), stdin) != NULL) {
            size_t len = strlen(students[i].name);
            if (len > 0 && students[i].name[len - 1] == '\n') {
                students[i].name[len - 1] = '\0';
            }
        }

        while (1) {
            printf("Enter Marks (0 - 100): ");
            if (scanf("%f", &students[i].marks) == 1 && students[i].marks >= 0.0f && students[i].marks <= 100.0f) {
                break;
            }
            printf("  [ERROR]: Marks must be between 0 and 100. Re-enter: ");
            while (getchar() != '\n');
        }

        /* Call assignGrade function via pointer */
        assignGrade(&students[i]);
        printf("\n");
    }

    /* Display records in formatted table */
    printf("\n===============================================================\n");
    printf("                    STUDENT RECORDS TABLE                      \n");
    printf("===============================================================\n");
    printf("%-10s | %-25s | %-10s | %-6s\n", "Roll No", "Student Name", "Marks", "Grade");
    printf("---------------------------------------------------------------\n");

    for (i = 0; i < NUM_STUDENTS; i++) {
        printf("%-10d | %-25s | %-10.2f | %-6c\n", 
               students[i].rollno, 
               students[i].name, 
               students[i].marks, 
               students[i].grade);
    }
    printf("===============================================================\n");

    /* Identify and display topper */
    printTopper(students, NUM_STUDENTS);

    return 0;
}
