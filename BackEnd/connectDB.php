<?php
/**
 * @file connectDB.php
 * @brief This file establishes a connection to the database.
 *
 * I created this file to handle the database connection for the application. 
 * It connects to the `libraryManagementSystemDB` database using the provided credentials.
 *
 * @details
 * - I defined the database server, username, password, and database name as variables.
 * - I used the `mysqli_connect` function to establish the connection.
 * - If the connection fails, I catch the exception and display an error message.
 * - If the connection is successful, I display a success message (for debugging purposes).
 *
 * @note 
 * - This file is included in other backend scripts to provide a shared database connection.
 * - Make sure to replace the placeholder password (`Password`) with the actual database password.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */



    // Database connection parameters
    $dbServer = "localhost"; /**< The database server address. */
    $dbUser = "root";        /**< The username for the database. */
    $dbPass = "Password";    /**< The password for the database. */
    $dbName = "libraryManagementSystemDB"; /**< The name of the database. */

    try {
        /**
         * @brief I establish a connection to the database.
         *
         * I use the `mysqli_connect` function to connect to the database using the provided credentials.
         * If the connection fails, an exception is caught, and an error message is displayed.
         */
        $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
    } 
    catch (mysqli_sql_exception $e) {
        /**
         * @brief I handle connection errors.
         *
         * If the connection fails, I catch the exception and display the error message.
         */
        echo "Connection failed: " . $e->getMessage();
    }

    if ($conn) {
        /**
         * @brief I confirm a successful connection.
         *
         * If the connection is successful, I display a success message for debugging purposes.
         */
        echo "Yoo, Connection successful";
    }

?>