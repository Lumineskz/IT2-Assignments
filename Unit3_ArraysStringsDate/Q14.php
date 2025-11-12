<?php
$birthdate = "2000-05-15";

// Convert to timestamps
$birthTimestamp = strtotime($birthdate);
$currentTimestamp = time();

// Format readable dates
$formattedBirthdate = date("F d, Y", $birthTimestamp);
$formattedCurrentDate = date("F d, Y", $currentTimestamp);

// Calculate age
$birthYear = date("Y", $birthTimestamp);
$birthMonth = date("m", $birthTimestamp);
$birthDay = date("d", $birthTimestamp);

$currentYear = date("Y", $currentTimestamp);
$currentMonth = date("m", $currentTimestamp);
$currentDay = date("d", $currentTimestamp);

$age = $currentYear - $birthYear;

// Adjust if current month/day is before birth month/day
if ($currentMonth < $birthMonth || ($currentMonth == $birthMonth && $currentDay < $birthDay)) {
    $age--;
}

// Output
echo "Birthdate: $formattedBirthdate<br>";
echo "Current Date: $formattedCurrentDate<br>";
echo "Age: $age years old";
?>
