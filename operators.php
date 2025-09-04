<?php
# (A)
$num1 = 5;
$num2 = 10;

$sum = $num1 + $num2;
$diff = $num2 + $num1; 
$prod = $num1 * $num2;
$div = $num2/$num1;
$mod = $num2%$num1;

echo "The numbers are $num2 and $num1";
echo "<br>\nThe sum is $sum, difference is $diff, product is $prod, division is $div and modulus is $mod</br>";

# (B)
$p = $num2 += 2;
$m = $num2 -= 2;
$n = $num2 *= 2;
$d = $num2 /= 2;
$s =$num2 %= 2;

echo "<br>\nUsing 10(num2) and 2: += : $p, -= : $m, *- : $n, /= : $d and %= : $s</br>"
?>