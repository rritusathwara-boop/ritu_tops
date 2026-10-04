#include <stdio.h>
#include <string.h>

int main() {
    char team[50];

    printf("Enter your favorite IPL team: ");
    scanf("%49s", team);

    if (strcmp(team, "MI") == 0 || strcmp(team, "Mumbai") == 0) {
        printf("Go Mumbai Indians!\n");
    } else if (strcmp(team, "CSK") == 0 || strcmp(team, "Chennai") == 0) {
        printf("Chennai Super Kings for the win!\n");
    } else if (strcmp(team, "RCB") == 0 || strcmp(team, "Bangalore") == 0) {
        printf("RCB, Ee Sala Cup Namde!\n");
    } else if (strcmp(team, "KKR") == 0 || strcmp(team, "Kolkata") == 0) {
        printf("Come on Kolkata Knight Riders!\n");
    } else if (strcmp(team, "GT") == 0 || strcmp(team, "Gujarat") == 0) {
        printf("Go Gujarat Titans!\n");
    } else {
        printf("Team not found!\n");
    }

    return 0;
}
