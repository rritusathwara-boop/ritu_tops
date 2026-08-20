<?php
// Class demonstrating Destructor

class FileHandler
{
    public $fileName;

    // Constructor
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        echo "File " . $this->fileName . " opened.<br>";
    }

    // Method
    public function readFile()
    {
        echo "Reading data from " . $this->fileName . "<br>";
    }

    // Destructor
    public function __destruct()
    {
        echo "File " . $this->fileName . " closed.<br>";
    }
}

// Creating object
$file1 = new FileHandler("data.txt");

// Calling method
$file1->readFile();

?>