<?php
# (A) Write a program that takes two numbers and displays their:
$num1 = 5;
$num2 = 10;

$sum = $num1 + $num2;
$diff = $num2 + $num1; 
$prod = $num1 * $num2;
$div = $num2/$num1;
$mod = $num2%$num1;

echo "The numbers are $num2 and $num1";
echo "<br>\nThe sum is $sum, difference is $diff, product is $prod, division is $div and modulus is $mod</br>";

# (B) Initialize a variable and apply the following operators step by step:
$p = $num2 += 2;
echo "<br>$p</br>";
$m = $num2 -= 2;
echo "<br>$m</br>";
$n = $num2 *= 2;
echo "<br>$n</br>";
$d = $num2 /= 2;
echo "<br>$d</br>";
$s =$num2 %= 2;
echo "<br>$s</br>";

# (C) Write a program that checks whether a number is between 1 and 100 and even using logical operators (&&, ||, !).
$number = 50;

echo "<br>\nChecking if the number {$number} is between 1 and 100 and even:</br>";


if ($number >= 1 && $number <= 100 && $number % 2 === 0) {
    echo "<br>\nResult: true</br>";
} else {
    echo "<br>\nResult: false</br>";
}
?>