#include <stdio.h>

int main() {
    int likes = 2500;
    int *ptrLikes = &likes;

    printf("Likes value: %d\n", likes);
    printf("Value through pointer: %d\n", *ptrLikes);
    printf("Address stored in ptrLikes: %p\n", (void *)ptrLikes);

    return 0;
}
