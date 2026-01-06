<?php
    // Update record
    include 'db_connect.php';
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE record SET name='$name', email='$email', phone='$phone' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        header("Location: display_records.php");
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM record WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>
</head>
<body>
    <form action="update_form.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Student name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required> <br><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required> <br><br>
        Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required> <br><br>
        <input type="submit" value="Update">
    </form><br><br>
    <a href="display_records.php">Cancel Editing</a>
</body>
</html>