<?php
/**
 * @file removeUser.php
 * @brief This file is used for testing purposes to remove all entries from the `users` table.
 *
 * I created this file to test the functionality of deleting all records from the `users` table 
 * in the database. It connects to the database, executes a `DELETE` query, and displays the result.
 *
 * @details
 * - I included the `connectDB.php` file to establish a connection to the database.
 * - The script executes a `DELETE` query to remove all entries from the `users` table.
 * - If the query is successful, I display a success message.
 * - If the query fails, I display an error message with the details of the failure.
 * - Finally, I close the database connection to free up resources.
 *
 * @note 
 * - This file is intended for testing purposes only and should not be used in production.
 * - Use this script with caution as it will delete all user data from the `users` table.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */


    include("connectDB.php");

    /**
     * @brief I execute a query to delete all entries from the `users` table.
     *
     * I use the `DELETE` SQL command to remove all records from the `users` table. 
     * If the query is successful, I display a success message. Otherwise, I display an error message.
     */
    $sql = "DELETE FROM users";

    if ($conn->query($sql) === TRUE) {
        echo "All entries have been removed from the users table.";
    } else {
        echo "Error: " . $conn->error;
    }

    /**
     * @brief I close the database connection.
     *
     * After executing the query, I close the database connection to free up resources.
     */
    $conn->close();
?>