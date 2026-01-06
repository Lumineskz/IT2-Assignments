<?php 
    include 'connect.php'; 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            // HAsh the password before storing it
            $password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
            $checked_email = "SELECT * FROM users WHERE email='$email'";
            // send query to check existing email
            $checkResult = mysqli_query($conn, $checked_email); 
            // Check if email already exists
            if(mysqli_num_rows($checkResult)>0){
                echo "Email already exists.";
                echo "<br><a href='register.php'>Go Back</a>";
                exit();
            }
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                header("Location: login.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
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
    <form action="register.php" method="post">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register"><br>
    </form>
    <a href="login.php">Login</a>
</body>
</html>