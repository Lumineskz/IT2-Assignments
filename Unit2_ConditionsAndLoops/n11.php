<?php
for ($i = 0; $i <= 50; $i++) {
    if ($i <= 1) {
        continue;
    } elseif ($i == 2) {
        echo "$i ";
    } elseif ($i % 2 == 0) {
        continue;
    } else {
        $isPrime = true; 
        for ($j = 3; $j <= sqrt($i); $j += 2) {
            if ($i % $j == 0) {
                $isPrime = false; 
                break;
            }
        }
        if ($isPrime) {
            echo "$i ";
        }
    }
}
?>
