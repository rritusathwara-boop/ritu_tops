<?php
$color = readline("Enter a color (red/green/blue): ");

switch(strtolower($color))
{
    case "red":
        echo "You selected: Red";
        break;

    case "green":
        echo "You selected: Green";
        break;

    case "blue":
        echo "You selected: Blue";
        break;

    default:
        echo "Invalid color! Please enter red, green, or blue.";
}
?>
