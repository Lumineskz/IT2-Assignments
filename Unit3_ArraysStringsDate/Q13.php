<?php
$timestamp = time(); 

echo "Current Date & Time:<br>";
echo "--------------------<br>";

echo "Format 1: " . date('Y-m-d', $timestamp) . "<br>";

echo "Format 2: " . date('d/m/Y', $timestamp) . "<br>";

echo "Format 3: " . date('F d, Y', $timestamp) . "<br>";

echo "Format 4: " . date('l, d-M-Y', $timestamp) . "<br>";

echo "Format 5: " . date('h:i:s A', $timestamp) . "<br>"; // Prints AM/PM at the end

echo "Format 6: " . date('H:i:s', $timestamp) . "   24H format <br>";

?>