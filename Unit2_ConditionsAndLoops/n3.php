<?php
$marks = 25;
if($marks>=90 && $marks<=100){
    echo "A";
}else if($marks>=75){
    echo "B";
}else if($marks>=60){
    echo "C";
}else if($marks>=40){
   echo "D"; 
}else if($marks<40 && $marks >=0){
    echo "Fail";
}else{
    echo "Invalid marks";
}
?>