<?php
session_start();
$_SESSION['user_visits'] = isset($_SESSION['user_visits']) ? $_SESSION['user_visits'] + 1 : 1;
echo "You have visited this page " . $_SESSION['user_visits'] . " times in this session.";
// reset button
echo '<form method="post"><button type="submit" name="reset">Reset Counter</button></form>';
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>