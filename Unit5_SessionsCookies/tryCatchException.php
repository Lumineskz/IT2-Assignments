<?php
class InputException extends Exception {}
$num1 = 5;
$num2 = 0;
try{
    if($num2 == 0){
        throw new InputException("Division by zero is not allowed.");
    }
}catch(InputException $e){
    echo "Custom Exception: ".$e->getMessage();
}finally{
    echo "\nExecution completed.";
}
?>