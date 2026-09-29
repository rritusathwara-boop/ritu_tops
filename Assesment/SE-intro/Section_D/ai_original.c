/*
 * ============================================================================
 * ASSESSMENT FILE: Software Engineering (M3-A1)
 * SECTION D: AI-Augmented Learning (STEP 1: BUILD WITH AI)
 * ============================================================================
 * ITEM 1: EXACT PROMPT GIVEN TO AI TOOL:
 * "Write a C program that does the following:
 *  1. Accepts exactly 10 integers from the user using a loop and stores them in an array.
 *  2. Finds and displays the maximum value, minimum value, and arithmetic mean (displayed as a float with 2 decimal places).
 *  3. Sorts the array in ascending order using any sorting method and displays the sorted list.
 *  4. Prints whether the mean is closer to the minimum, closer to the maximum, or exactly midway between them."
 * ============================================================================
 * ITEM 2A: AI'S ORIGINAL CODE (Before human debugging and testing)
 * ============================================================================
 */

#include <stdio.h>

int main() {
    int arr[10];
    int sum = 0;
    int min, max;
    float mean;
    int i, j, temp;

    printf("Enter 10 integers:\n");
    for (i = 0; i < 10; i++) {
        scanf("%d", &arr[i]);
        sum += arr[i];
    }

    // Bug 1: Integer division truncation (sum / 10 drops fractional part)
    mean = sum / 10;

    min = arr[0];
    max = arr[0];
    for (i = 1; i < 10; i++) {
        if (arr[i] < min) min = arr[i];
        if (arr[i] > max) max = arr[i];
    }

    // Sort array (Ascending)
    for (i = 0; i < 10; i++) {
        for (j = 0; j < 9; j++) {
            if (arr[j] > arr[j + 1]) {
                temp = arr[j];
                arr[j] = arr[j + 1];
                arr[j + 1] = temp;
            }
        }
    }

    printf("\nSorted Array: ");
    for (i = 0; i < 10; i++) {
        printf("%d ", arr[i]);
    }
    printf("\n");

    printf("Minimum: %d\n", min);
    printf("Maximum: %d\n", max);
    printf("Mean: %.2f\n", mean);

    // Bug 2: Distance comparison does not handle floating point representation or all-identical inputs
    float dist_to_min = mean - min;
    float dist_to_max = max - mean;

    if (dist_to_min < dist_to_max) {
        printf("The mean is closer to the minimum.\n");
    } else if (dist_to_max < dist_to_min) {
        printf("The mean is closer to the maximum.\n");
    } else {
        printf("The mean is exactly midway between minimum and maximum.\n");
    }

    return 0;
}
