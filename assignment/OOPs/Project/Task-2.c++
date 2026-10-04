#include <iostream>
#include <fstream>
#include <sstream>
#include <vector>
#include <string>

using namespace std;

// Content Class
class Content
{
public:
    string title;
    string platform;
    int views;
    string status;

    // Display content details
    void display()
    {
        cout << "Title: " << title << endl;
        cout << "Platform: " << platform << endl;
        cout << "Views: " << views << endl;
        cout << "Status: " << status << endl;
    }
};

// Add Content
void addContent()
{
    Content c;

    cout << "\nEnter content title: ";
    getline(cin, c.title);

    cout << "Enter platform: ";
    getline(cin, c.platform);

    cout << "Enter views: ";
    cin >> c.views;
    cin.ignore();

    cout << "Enter status: ";
    getline(cin, c.status);

    ofstream file("content_list.txt", ios::app);

    file << c.title << "|"
         << c.platform << "|"
         << c.views << "|"
         << c.status << endl;

    file.close();

    cout << "\nContent added successfully!\n";
}

// Read all contents
vector<Content> readContents()
{
    vector<Content> contents;

    ifstream file("content_list.txt");

    string line;

    while (getline(file, line))
    {
        stringstream ss(line);

        Content c;
        string viewsString;

        getline(ss, c.title, '|');
        getline(ss, c.platform, '|');
        getline(ss, viewsString, '|');
        getline(ss, c.status, '|');

        c.views = stoi(viewsString);

        contents.push_back(c);
    }

    file.close();

    return contents;
}

// Display Content List
void displayContents()
{
    vector<Content> contents = readContents();

    if (contents.empty())
    {
        cout << "\nNo content available.\n";
        return;
    }

    cout << "\n========== CONTENT LIST ==========\n";

    for (int i = 0; i < contents.size(); i++)
    {
        cout << "\n" << i + 1 << ". "
             << contents[i].title
             << " | "
             << contents[i].platform
             << endl;
    }
}

// Update Status
void updateStatus()
{
    vector<Content> contents = readContents();

    if (contents.empty())
    {
        cout << "\nNo content available.\n";
        return;
    }

    displayContents();

    int number;

    cout << "\nEnter content number to update: ";
    cin >> number;
    cin.ignore();

    if (number < 1 || number > contents.size())
    {
        cout << "Invalid content number!\n";
        return;
    }

    cout << "Enter new status: ";
    getline(cin, contents[number - 1].status);

    // Overwrite file
    ofstream file("content_list.txt");

    for (Content c : contents)
    {
        file << c.title << "|"
             << c.platform << "|"
             << c.views << "|"
             << c.status << endl;
    }

    file.close();

    cout << "\nStatus updated successfully!\n";
}

// Delete Content
void deleteContent()
{
    vector<Content> contents = readContents();

    if (contents.empty())
    {
        cout << "\nNo content available.\n";
        return;
    }

    displayContents();

    int number;

    cout << "\nEnter content number to delete: ";
    cin >> number;
    cin.ignore();

    if (number < 1 || number > contents.size())
    {
        cout << "Invalid content number!\n";
        return;
    }

    contents.erase(contents.begin() + (number - 1));

    // Rewrite file
    ofstream file("content_list.txt");

    for (Content c : contents)
    {
        file << c.title << "|"
             << c.platform << "|"
             << c.views << "|"
             << c.status << endl;
    }

    file.close();

    cout << "\nContent deleted successfully!\n";

    cout << "\nUpdated Content List:\n";

    displayContents();
}

// Main Menu
int main()
{
    int choice;

    do
    {
        cout << "\n\n";
        cout << "====================================\n";
        cout << "       CREATOR DASHBOARD LITE\n";
        cout << "====================================\n";

        cout << "1. Add Content\n";
        cout << "2. View Content\n";
        cout << "3. Update Content Status\n";
        cout << "4. Delete Content\n";
        cout << "5. Exit\n";

        cout << "\nEnter your choice: ";
        cin >> choice;
        cin.ignore();

        switch (choice)
        {
        case 1:
            addContent();
            break;

        case 2:
            displayContents();
            break;

        case 3:
            updateStatus();
            break;

        case 4:
            deleteContent();
            break;

        case 5:
            cout << "\nThank you for using Creator Dashboard!\n";
            break;

        default:
            cout << "\nInvalid choice!\n";
        }

    } while (choice != 5);

    return 0;
}