<?php
$students = [
    ["name" => "Ram", "age" => 20, "faculty" => "BCA"],
    ["name" => "Sita", "age" => 19, "faculty" => "BIT"],
    ["name" => "Hari", "age" => 21, "faculty" => "BCA"]
];
foreach($students as $index => $student){
    $num = $index + 1;
    echo "Student $num: " .$student["name"]. " Age: ". $student["age"]. " Faculty: " .$student["faculty"]."<br>";
}
?>