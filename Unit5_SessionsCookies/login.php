<?php 
    session_start();
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $users = [
            "admin" => ["password" => "admin123", "role" => "admin"],
            "student" => ["password" => "user123", "role" => "student"]
        ];
        // Validate credentials
        if(isset($users[$username])&& $users[$username]['password']===$password){
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $users[$username]['role'];
            // Redirect based on role
            if(($_SESSION['role'])==="admin"){
                header("Location:admin.php");
            }else{
                header("Location: student.php");
            }
            exit();
        }else{
            echo "<p>Invalid username or password</p>"; // Display error message
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
    <h2>Log in form</h2>
    <form action="" method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>