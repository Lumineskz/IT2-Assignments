<?php
// Given array
$students = ["Ram", "Sita", "Hari"];
echo "Before adding:<br>";
foreach($students as $student){
    echo $student.", " ;
}echo "<br>";

// Add "Gita" and "Laxman"
array_push($students, "Gita", "Laxman");
echo "After adding Gita and Laxman:<br>";
foreach($students as $student){
    echo $student.", " ;
}echo "<br>";

// Remove last student
echo "After removing last student:<br>";
array_pop($students);
foreach($students as $student){
    echo $student. ", ";
}echo "<br>";

// Check if "Ram" exists
if (in_array("Ram", $students)) {
    echo "Ram exists in the list.<br>";
} else {
    echo "Ram does not exist in the list.<br>";
}

// Display total number of students
echo "Total students: " . count($students) . "<br>";

?>
