<?php
function calculateAverage(...$marks) {
    if (count($marks) === 0) {
        return 0; 
    }
    
    $sum = array_sum($marks);
    $average = $sum / count($marks);
    
    return round($average, 2);
}

echo calculateAverage(80, 90, 70) . "<br>"; 
echo calculateAverage(50, 60) . "<br>";      
echo calculateAverage() . "<br>";            
?>
