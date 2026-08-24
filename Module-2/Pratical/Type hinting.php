<?php
class Calculator {

    public function add(int $a, int $b) {
        return $a + $b;
    }

    public function greet(string $name) {
        return "Hello, " . $name;
    }

    public function checkStatus(bool $status) {
        return $status ? "Active" : "Inactive";
    }
}

$obj = new Calculator();

echo $obj->add(10, 20) . "<br>";
echo $obj->greet("Ritu") . "<br>";
echo $obj->checkStatus(true);
?>