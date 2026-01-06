<?php
    include 'connect.php';
    
    // Get ID from the URL string
    $id = $_GET['id'];

    // Fetch existing data
    $result = mysqli_query($conn, "SELECT * FROM employee WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    // Update logic
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $dept = $_POST['dept'];
        $salary = $_POST['salary'];
        
        // Pure string concatenation
        $sql = "UPDATE employee SET name='$name', dept='$dept', salary='$salary' WHERE id=$id";

        if (mysqli_query($conn, $sql)){
            header("Location: view.php");
            exit(); 
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Edit Employee</h2>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        Dept: <input type="text" name="dept" value="<?php echo $row['dept']; ?>" required><br><br>
        Salary: <input type="number" name="salary" value="<?php echo $row['salary']; ?>" required><br><br>
        
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>