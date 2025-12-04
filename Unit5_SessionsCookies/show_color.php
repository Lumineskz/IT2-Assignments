<?php
if (isset($_COOKIE['user_color'])) {
    $selectedColor = $_COOKIE['user_color'];
    echo "Your selected color is: " . htmlspecialchars($selectedColor);
} else {
    echo "No color has been selected yet.";
}
?>
