=========Final class=========
<?php
final class Vehicle {
    public function start() {
        echo "Vehicle started";
    }
}

// Error: Cannot extend a final class
class Car extends Vehicle {
}
?>

=========Final method=========

<?php
class Vehicle {
    final public function start() {
        echo "Vehicle started";
    }
}

class Car extends Vehicle {
    // Error: Cannot override final method
    public function start() {
        echo "Car started";
    }
}
?>