#include <stdio.h>

struct FoodItem {
    char itemName[50];
    float price;
    float rating;
};

int main() {
    struct FoodItem menu[3] = {
        {"Paneer Pizza", 250.0f, 4.5f},
        {"Veg Burger", 150.0f, 4.2f},
        {"Masala Dosa", 120.0f, 4.6f}
    };

    for (int i = 0; i < 3; i++) {
        printf("\nItem: %s\n", menu[i].itemName);
        printf("Price: Rs. %.2f\n", menu[i].price);
        printf("Rating: %.1f\n", menu[i].rating);
    }

    return 0;
}
