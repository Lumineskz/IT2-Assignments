<?php
$n = 20; 
$isPrime = true;

if ($n <= 1) {
    $isPrime = false; 
} elseif ($n == 2) {
    $isPrime = true; 
} elseif ($n % 2 == 0) {
    $isPrime = false;
} else {
    for ($i = 3; $i <= sqrt($n); $i += 2) {
        if ($n % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}

if ($isPrime)
    echo "$n is a prime number.";
else
    echo "$n is not a prime number.";
?>
