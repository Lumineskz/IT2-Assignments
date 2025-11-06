<?php
function celciusToFahrenheit($celsius) {
    return ($celsius * 9/5) + 32;
}
$temperaturesC = [0, 25, 100];
foreach ($temperaturesC as $tempC) {
    $tempF = celciusToFahrenheit($tempC);
    echo "$tempC °C is equal to $tempF °F<br>";
}
?>