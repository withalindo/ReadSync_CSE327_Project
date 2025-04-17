<?php
/**
 * @file testDB.php
 * @brief This file is used for testing purposes to verify the database connection.
 *
 * I created this file to test whether the database connection is successfully established 
 * using the `connectDB.php` file. It includes the database connection script and displays 
 * a success message if the connection is successful.
 *
 * @details
 * - I included the `connectDB.php` file to establish a connection to the database.
 * - If the connection is successful, I display a success message.
 * - This file is intended for testing purposes only and does not perform any other operations.
 *
 * @note 
 * - This script should only be used during development to verify the database connection.
 * - Ensure that the `connectDB.php` file contains the correct database credentials.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */


    include "../BackEnd/connectDB.php";

    /**
     * @brief I display a success message if the database connection is established.
     *
     * This message confirms that the `connectDB.php` file is working correctly and the 
     * database connection parameters are valid.
     */
    echo "Database connection successful!";
?>