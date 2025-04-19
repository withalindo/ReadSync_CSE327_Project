<?php
/**
 * @file connectDB.php
 * @brief This is the script I use to connect to my MySQL database.
 *
 * In this file, I define the database connection parameters and establish
 * a connection to the database. If the connection fails, I handle the error
 * gracefully and display an appropriate message. If it succeeds, I confirm
 * the connection with a success message.
 *

 * @date April 19, 2025
 */



    /**
     * @var string $dbServer This is the hostname of the database server I connect to.
     */
    $dbServer = "localhost";

    /**
     * @var string $dbUser This is the username I use for the database connection.
     */
    $dbUser = "root";

    /**
     * @var string $dbPass This is the password I use for the database connection.
     */
    $dbPass = "Password";

    /**
     * @var string $dbName This is the name of the database I want to connect to.
     */
    $dbName = "libraryManagementSystemDB";

    try {
        /**
         * @var mysqli $conn This is the connection object I use to interact with the database.
         * @throws mysqli_sql_exception If the connection fails, I catch the exception here.
         */
        $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
    } 
    catch (mysqli_sql_exception $e) 
    {
        /**
         * If the connection fails, I display this error message.
         */
        echo "Connection failed: " . $e->getMessage();
    }

    if ($conn) 
    {
        /**
         * If the connection is successful, I display this success message.
         */
        echo "Yoo, Connection successful";
    }

?>