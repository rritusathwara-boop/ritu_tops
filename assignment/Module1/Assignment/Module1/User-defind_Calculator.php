<?php
// Function for Addition
function add($a, $b) {
    return $a + $b;
}

// Function for Subtraction
function subtract($a, $b) {
    return $a - $b;
}

// Function for Multiplication
function multiply($a, $b) {
    return $a * $b;
}

// Function for Division
function divide($a, $b) {
    if ($b == 0) {
        return "Error: Division by zero!";
    }
    return $a / $b;
}
?>
