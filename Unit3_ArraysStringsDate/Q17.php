<?php
// Given tags
$tags = ["PHP", "Web Development", "Programming", "MySQL", "Backend"];

// Display tags as array
echo "Tags as array: [\"" . implode('", "', $tags) . "\"]<br><br>";

// Convert array to string
$tagString = implode(", ", $tags);
echo "Tags as string: $tagString<br><br>";

// Convert string back to array
$newTags = explode(", ", $tagString);

// Check if specific tags exist
if (in_array("PHP", $newTags)) {
    echo "\"PHP\" tag exists<br>";
} else {
    echo "\"PHP\" tag not found<br>";
}

if (in_array("JavaScript", $newTags)) {
    echo "\"JavaScript\" tag exists<br>";
} else {
    echo "\"JavaScript\" tag not found<br>";
}

// Sort tags alphabetically
sort($newTags);
echo "<br>Sorted tags: " . implode(", ", $newTags) . "<br>";

// Display total tags
echo "Total tags: " . count($newTags);
?>
