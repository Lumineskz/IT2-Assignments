<?php
$count = 0;

while ($count < 10) {
    $num = readline("Enter number " . ($count + 1) . ": ");

    if ($num < 0) {
        echo "Negative number entered. Stopping input.";
        break;
    }

    echo "You entered: $num\n";
    $count++;
}
?>
