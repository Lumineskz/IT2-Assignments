<?php
    $email = "RAM.Sharma@EXAMPLE.com";
    $cleaned = strtolower($email);
    $at_pos = strpos($cleaned, '@');
    echo "Original: $email<br>";
    echo "Cleaned: $cleaned<br><br>";
    if($at_pos !== false){
        $username = substr($cleaned, 0,$at_pos);
        $domain = substr($cleaned,$at_pos+1);

        echo "Valid Email Format: <br>";
        echo "Username: $username<br>";
        echo "Domain: $domain <br>";
    }else{
        echo "Invalid email format(Missing @ symbol)";
    }
    
?>