<?php
    // Delete record
    include 'connect.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM employee where id=$id";

        if(mysqli_query($conn,$sql)){
            header("Location: view.php");
            exit();
        }else{
            echo "Error: " . mysqli_error($conn);
        }
    }
?>