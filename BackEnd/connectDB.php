<?php

    $dbServer = "localhost";
    $dbUser = "root";
    $dbPass = "Password";
    $dbName = "libraryManagementSystemDB";
    try {
    $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
    } 
    catch (mysqli_sql_exception) 
    {
    echo "Connection failed: " . $e->getMessage();
    }

    if ($conn) 
    {
    echo "Yoo, Connection successful";
    }

?>