<?php
    // Show password
    include 'connect.php';
    $sql = "SELECT password FROM users LIMIT 1";
    $result = mysqli_query($conn, $sql);
    session_start();
    
    // Show unhashed password
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "Unhashed Password: " . $row['password'];
    } else {
        echo "No password found.";
    }
?>