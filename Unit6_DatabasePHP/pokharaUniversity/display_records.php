<?php
    include 'db_connect.php';
    $sql = "SELECT * FROM record";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        echo "<table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Modify</th>
        </tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>
                    <a href='update_form.php?id=" . $row['id'] . "'>Update</a> |
                    <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
            </tr>";
        }
        echo "</table>";
        
    }else{
        echo "0 results";
    }
    echo "<br><a href='insert.php'>Add New Record</a>";
?>