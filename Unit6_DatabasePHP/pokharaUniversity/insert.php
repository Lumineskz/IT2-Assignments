<?php
    include 'db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "INSERT INTO record (name, email, phone) VALUES ('$name', '$email', '$phone')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location: display_records.php");
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Student name: <input type="text" name="name" required> <br><br>
        Email: <input type="email" name="email" required> <br><br>
        Phone: <input type="text" name="phone" required> <br><br>
        <input type="submit" value="Submit">
</body>
</html>