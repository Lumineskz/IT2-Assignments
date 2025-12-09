<?php
session_start();
    if(!isset($_SESSION["username"]) || $_SESSION["role"] !== "student"){
        header("Location: access_denied.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h2>Hello Student, <?php echo $_SESSION['username']; ?>!</h2>
    <p>This is the student dashboard. Only student users can access this page</p><br>
    <a href="logout.php">Logout</a>
</body>
</html>