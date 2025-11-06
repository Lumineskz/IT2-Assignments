<?php

$num1 = 15.567;
$num2 = 7.234;


$displayNum1 = round($num1, 2); // 15.57
$displayNum2 = round($num2, 2); // 7.23

echo "<h2>Simple Calculator Results</h2>";

// --- Addition ---
$addResult = $num1 + $num2;
$addResultAbs = abs($addResult);
$addResultFormatted = number_format($addResultAbs, 2, '.', '');
echo "Addition: $displayNum1 + $displayNum2 = $addResultFormatted<br>"; // 22.80

// --- Subtraction ---
$subtractResult = $num1 - $num2;
$subtractResultAbs = abs($subtractResult); // Ensures absolute value is taken (though not needed here: 8.333 -> 8.33)
$subtractResultFormatted = number_format($subtractResultAbs, 2, '.', '');
echo "Subtraction: $displayNum1 - $displayNum2 = $subtractResultFormatted<br>"; // 8.34

// --- Multiplication ---
$multiplyResult = $num1 * $num2;
$multiplyResultAbs = abs($multiplyResult);
$multiplyResultFormatted = number_format($multiplyResultAbs, 2, '.', '');

echo "Multiplication: $displayNum1 &times; $displayNum2 = $multiplyResultFormatted<br>"; // 112.56


if ($num2 != 0) {
    $divideResult = $num1 / $num2;
    $divideResultAbs = abs($divideResult);
    $divideResultFormatted = number_format($divideResultAbs, 2, '.', '');
    echo "Division: $displayNum1 &divide; $displayNum2 = $divideResultFormatted<br>"; // 2.15
} else {
    echo "Division: $displayNum1 &divide; $displayNum2 = **Error (Division by zero)**<br>";
}

?>