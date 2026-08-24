<?php
// Parent class
class Vehicle
{
    // Properties
    public $brand;
    public $speed;

    // Constructor
    public function __construct($brand, $speed)
    {
        $this->brand = $brand;
        $this->speed = $speed;
    }

    // Method in parent class
    public function vehicleInfo()
    {
        echo "Vehicle Brand: " . $this->brand . "<br>";
        echo "Vehicle Speed: " . $this->speed . " km/h<br>";
    }
}

// Child class extending Vehicle
class Car extends Vehicle
{
    // Additional property
    public $model;

    // Constructor
    public function __construct($brand, $speed, $model)
    {
        // Calling parent constructor
        parent::__construct($brand, $speed);

        $this->model = $model;
    }

    // Additional method
    public function carInfo()
    {
        echo "Car Model: " . $this->model . "<br>";
    }
}

// Creating object of Car class
$car1 = new Car("Toyota", 180, "Corolla");

// Accessing inherited method
$car1->vehicleInfo();

// Accessing child class method
$car1->carInfo();

?>