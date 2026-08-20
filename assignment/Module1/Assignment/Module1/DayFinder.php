<?php
$today = date("l");   // l = full day name like Sunday, Monday

if ($today == "Sunday") {
    echo "Happy Sunday!";
} 
else 
{
    echo "Today is: " . $today;
}
?>
