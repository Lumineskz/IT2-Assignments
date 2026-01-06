<?php 
    include 'connect.php'; 

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Retrieve the hashed password from the database
            $sql = "SELECT password FROM users WHERE email='$email'";
            // Check email and password validation

            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashed_password = $row['password'];
                
                // Verify the password
                if (password_verify($password, $hashed_password)) {
                    echo "Login successful!";
                    header("Location: index.php");
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "No user found with that email.";
            }
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login"><br>
    </form>
    <a href="register.php">Register</a>
</body>
</html>