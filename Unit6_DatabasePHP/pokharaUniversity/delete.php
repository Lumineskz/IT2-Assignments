<?php
    include 'db_connect.php';
    
    // Delete record
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM record WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        header("Location: display_records.php");
    }
    $conn->close();

?>