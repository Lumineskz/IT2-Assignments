<?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $dept = $_POST['dept'];
        $salary = $_POST['salary'];

        $sql = "INSERT INTO employee (name, dept, salary) VALUES ('$name', '$dept', '$salary')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location: view.php");
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
    <form method='post'>
        Name: <input type="text" name="name" required> <br><br>
        Department: <input type="text" name="dept" required> <br><br>
        Salary: <input type="number" name="salary" required> <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>