<?php
    include 'connect.php';
    // Display all records
    $sql = "SELECT * FROM employee";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='10' cellspacing='0'><tr><th>ID</th><th>Name</th><th>Department</th><th>Salary</th><th>Manage</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["dept"]."</td><td>".$row["salary"]."</td><td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."' onclick=\"return confirm('Are you sure?')\">Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    echo "<br><a href='insert.php'>Add New Employee</a>";
?>
