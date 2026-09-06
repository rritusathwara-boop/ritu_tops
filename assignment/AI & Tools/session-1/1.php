<?php

function formatSubscriberCount($number) {
    if ($number >= 1000000000) {
        return round($number / 1000000000, 1) . 'B';
    } elseif ($number >= 1000000) {
        return round($number / 1000000, 1) . 'M';
    } elseif ($number >= 1000) {
        return round($number / 1000, 1) . 'K';
    }

    return (string) $number;
}

// Test with three different numbers
$testNumbers = [1500, 1200000, 850];

foreach ($testNumbers as $number) {
    echo $number . " => " . formatSubscriberCount($number) . PHP_EOL;
}
?>
