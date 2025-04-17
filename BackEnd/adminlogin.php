<?php
/**
 * @file adminlogin.php
 * @brief This is the backend file for handling admin login functionality.
 *
 * I created this file to process the login requests from the admin login page. 
 * It validates the admin's credentials, checks them against the database, and starts a session 
 * if the login is successful.
 *
 * @details
 * - I included the `connectDB.php` file to establish a connection to the database.
 * - The script checks if the login form was submitted and retrieves the admin's credentials.
 * - I implemented input validation to ensure that the fields are not empty.
 * - The script uses a prepared statement to securely query the database for the admin's information.
 * - If the credentials are valid, I start a session and redirect the admin to the dashboard.
 * - If the credentials are invalid, I display appropriate error messages using JavaScript alerts.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */


    session_start();
    include('connectDB.php');

    if (isset($_POST['login'])) {
        /**
         * @brief I retrieve and sanitize the admin's credentials.
         *
         * I trim the input values to remove unnecessary whitespace and cast the admin ID to an integer.
         */
        $admin_id = (int) trim($_POST['admin_id']);
        $password = trim($_POST['password']);

        /**
         * @brief I check if the input fields are empty.
         *
         * If either the admin ID or password is empty, I display an alert and redirect the user 
         * back to the login page.
         */
        if (empty($admin_id) || empty($password)) {
            echo "<script>alert('Fields cannot be empty.'); window.location.href='../FrontEnd/adminLoginF.php';</script>";
            exit();
        }

        /**
         * @brief I prepare a secure SQL query to fetch the admin's details.
         *
         * I use a prepared statement to prevent SQL injection and query the database for the admin's 
         * information based on the provided admin ID.
         */
        $stmt = $conn->prepare("SELECT * FROM admins WHERE admin_id = ? LIMIT 1");
        $stmt->bind_param("i", $admin_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            /**
             * @brief I verify the admin's password.
             *
             * If the password matches the one stored in the database, I start a session and store 
             * the admin's details in session variables. Otherwise, I display an error message.
             */
            if ($password === $row['admin_password']) {
                $_SESSION['name']     = $row['admin_name'];
                $_SESSION['email']    = $row['admin_email'];
                $_SESSION['admin_id'] = $row['admin_id'];
                header("Location: ../FrontEnd/adminDashboardF.php");
                exit();
            } else {
                echo "<script>alert('Wrong Password.'); window.location.href='../FrontEnd/adminLoginF.php';</script>";
                exit();
            }
        } else {
            /**
             * @brief I handle invalid admin IDs.
             *
             * If the admin ID does not exist in the database, I display an error message and redirect 
             * the user back to the login page.
             */
            echo "<script>alert('Invalid Admin ID.'); window.location.href='../FrontEnd/adminLoginF.php';</script>";
            exit();
        }

        /**
         * @brief I close the database connection and statement.
         *
         * After processing the login request, I ensure that the database connection and prepared 
         * statement are properly closed.
         */
        $stmt->close();
        $conn->close();
    }
?>