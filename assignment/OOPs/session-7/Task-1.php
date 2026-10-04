#include <iostream>
#include <fstream>
using namespace std;

int main()
{
    ofstream file("my_fav_songs.txt");

    file << "Perfect" << endl;
    file << "Espresso" << endl;
    file << "Beautiful Things" << endl;
    file << "Birds of a Feather" << endl;
    file << "Shape of You" << endl;

    file.close();

    cout << "5 songs saved successfully.";

    return 0;
}