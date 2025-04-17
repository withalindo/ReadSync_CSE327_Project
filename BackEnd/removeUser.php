<!-- For Test Purposes -->
<?php
    include("connectDB.php");

  
    $sql = "DELETE FROM users";

    if ($conn->query($sql) === TRUE) {
        echo "All entries have been removed from the users table.";
    } else {
        echo "Error: " . $conn->error;
    }


    $conn->close();
?>