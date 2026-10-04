#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main()
{
    ifstream file("my_fav_songs.txt");

    string song;

    while (getline(file, song))
    {
        cout << song << endl;
    }

    file.close();

    return 0;
}