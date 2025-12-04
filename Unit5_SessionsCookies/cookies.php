<?php
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    // Set cookie valid for 1 day
    setcookie("user_color", $color, time() + 86400, "/");
    echo "Cookie has been set! <a href='show_color.php'>Go to color page</a>";
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="post">
    <label>Select a color:</label>
    <select name="color">
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="green">Green</option>
    </select>

    <input type="submit" value="Save Color">
</form>

</body>
</html>
