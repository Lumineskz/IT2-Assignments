<?php
$marks = [
      "Internet Technology" => 85,
      "Data Structure" => 78,
      "Database" => 92,
      "Java Programming" => 88
];

$total = $marks["Internet Technology"] + $marks["Data Structure"] + $marks["Database"] + $marks["Java Programming"];
$average = $total/4;
$grade = "F";
if($average >= 80){
    $grade = "A";
}elseif($grade >= 60){
    $grade = "B";
}elseif($grade >= 40){
    $grade = "C";
}
echo "Marks of each subject:<br>";
echo "IT: ". $marks['Internet Technology'] . "<br>";
echo "DSA: ". $marks['Data Structure'] . "<br>";
echo "DBMS: ". $marks['Database'] . "<br>";
echo "Java: ". $marks['Java Programming'] . "<br>";
echo "<strong>TOTAL:  </strong>". $total . "<br>";
echo "<strong>Average: </strong>" .$average . "<br>";
echo "<strong>Grade: </strong>" .$grade . "<br>";
?>