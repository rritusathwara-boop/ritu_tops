#include <stdio.h>
#include <string.h>

int main() {
    char meal[20];

    printf("Enter meal time (breakfast/lunch/dinner/snack): ");
    scanf("%19s", meal);

    if (strcmp(meal, "breakfast") == 0) {
        printf("Suggested dish: Masala Dosa\n");
    } else if (strcmp(meal, "lunch") == 0) {
        printf("Suggested dish: Veg Thali\n");
    } else if (strcmp(meal, "dinner") == 0) {
        printf("Suggested dish: Paneer Tikka\n");
    } else if (strcmp(meal, "snack") == 0) {
        printf("Suggested dish: Samosa\n");
    } else {
        printf("Try some fruits!\n");
    }

    return 0;
}
