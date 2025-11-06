<?php
    $username = "Ram123";
    $trimmed = trim($username);
    $length = strlen($trimmed);
    $min=5;
    $max=15;
    if($length>=$min && $length<=15){
        $isValid = true;
        $message = "Username is valid ($length characters)";
    }else{
        $isValid = false;
        $message = "Username is **invalid**. It must be between $minl and $max characters long.";
    }
    echo "Username: " . $trimmed . "<br>";
    echo "Length: " .$length . " characters <br>";
    echo "$message<br>";


?>