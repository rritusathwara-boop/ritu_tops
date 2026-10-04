#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main()
{
    ofstream file("wishlist.txt");

    string product;
    double price;

    for (int i = 1; i <= 3; i++)
    {
        cout << "Enter product " << i << ": ";
        getline(cin, product);

        cout << "Enter price: ";
        cin >> price;

        cin.ignore();

        file << product << " - Rs. " << price << endl;
    }

    file.close();

    cout << "\nWishlist saved successfully.\n\n";

    // Read file
    ifstream readFile("wishlist.txt");

    string line;

    cout << "--- Wishlist ---\n";

    while (getline(readFile, line))
    {
        cout << line << endl;
    }

    readFile.close();

    return 0;
}