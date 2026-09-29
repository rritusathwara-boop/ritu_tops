/*
 * ============================================================================
 * ASSESSMENT FILE: Software Engineering (M3-A1)
 * SECTION D: AI-Augmented Learning (STEP 2: TEST & DEBUG)
 * ============================================================================
 * ITEM 3: 3-4 LINE EXPLANATORY NOTE ON CORRECTIONS:
 * ----------------------------------------------------------------------------
 * In the AI's original code, arithmetic mean calculation suffered from integer
 * division truncation (sum / 10), losing fractional decimal precision. The code
 * also lacked proper handling for boundary inputs where all 10 numbers are identical
 * (min == max), and used direct float comparisons without an epsilon threshold.
 * I corrected this by casting to float, adding epsilon-based midway checks using
 * fabsf(), handling identical-value boundary cases, and validating user inputs.
 * ============================================================================
 * ITEM 2B: CORRECTED & TESTED C CODE
 * ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>
#include <math.h>

#define SIZE 10
#define EPSILON 1e-6f

int main(void) {
    int arr[SIZE];
    int sum = 0;
    int min, max;
    float mean;
    int i, j, temp, swapped;

    printf("====================================================\n");
    printf("   SECTION D: TESTED & CORRECTED STATISTICAL CODE   \n");
    printf("====================================================\n");
    printf("Enter %d integers (positive, negative, or zero):\n", SIZE);

    for (i = 0; i < SIZE; i++) {
        while (1) {
            printf("  Element [%d]: ", i + 1);
            if (scanf("%d", &arr[i]) == 1) {
                sum += arr[i];
                break;
            } else {
                printf("    [ERROR]: Invalid integer. Please re-enter.\n");
                while (getchar() != '\n');
            }
        }
    }

    /* FIX 1: Explicit float casting prevents integer truncation */
    mean = (float)sum / (float)SIZE;

    min = arr[0];
    max = arr[0];
    for (i = 1; i < SIZE; i++) {
        if (arr[i] < min) min = arr[i];
        if (arr[i] > max) max = arr[i];
    }

    /* FIX 2: Optimized Bubble Sort */
    for (i = 0; i < SIZE - 1; i++) {
        swapped = 0;
        for (j = 0; j < SIZE - 1 - i; j++) {
            if (arr[j] > arr[j + 1]) {
                temp = arr[j];
                arr[j] = arr[j + 1];
                arr[j + 1] = temp;
                swapped = 1;
            }
        }
        if (!swapped) break;
    }

    printf("\n---------------- Analysis Report -------------------\n");
    printf("Sorted Array (Ascending): ");
    for (i = 0; i < SIZE; i++) {
        printf("%d%s", arr[i], (i == SIZE - 1) ? "" : ", ");
    }
    printf("\n");

    printf("Minimum Value           : %d\n", min);
    printf("Maximum Value           : %d\n", max);
    printf("Arithmetic Mean         : %.2f\n", mean);

    /* FIX 3: Robust Distance & Midway evaluation for all boundary test cases */
    if (min == max) {
        printf("Observation             : All 10 values are identical (%d). Mean equals min and max.\n", min);
    } else {
        float dist_to_min = fabsf(mean - (float)min);
        float dist_to_max = fabsf((float)max - mean);

        if (fabsf(dist_to_min - dist_to_max) < EPSILON) {
            printf("Result                  : The mean (%.2f) is EXACTLY MIDWAY between minimum (%d) and maximum (%d).\n", 
                   mean, min, max);
        } else if (dist_to_min < dist_to_max) {
            printf("Result                  : The mean (%.2f) is CLOSER TO THE MINIMUM (%d).\n", 
                   mean, min);
        } else {
            printf("Result                  : The mean (%.2f) is CLOSER TO THE MAXIMUM (%d).\n", 
                   mean, max);
        }
    }
    printf("====================================================\n");

    return 0;
}
