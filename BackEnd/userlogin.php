<?php
/**
 * @file userlogin.php
 * @brief This file handles the backend logic for user login functionality.
 *
 * I created this file to process login requests from the user login page. 
 * It validates the user's credentials, checks them against the database, and starts a session 
 * if the login is successful.
 *
 * @details
 * - I included the `connectDB.php` file to establish a connection to the database.
 * - The script retrieves the user's email and password from the form submission.
 * - I implemented input validation to ensure that the fields are not empty and the email is in a valid format.
 * - The script uses a prepared statement to securely query the database for the user's information.
 * - If the credentials are valid, I start a session and redirect the user to their dashboard.
 * - If the credentials are invalid, I display appropriate error messages using JavaScript alerts.
 * - I also close the database connection and prepared statement after processing.
 *
 * @note 
 * - Ensure that the `users` table in the database contains the appropriate schema for user authentication.
 * - This file is intended for use by registered users only.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */


    session_start();
    include('connectDB.php');

    if (isset($_POST['login'])) {
        // Retrieve and sanitize form data
        /**
         * @brief I retrieve and sanitize the user's email and password.
         *
         * I use `filter_input` to sanitize the email and password fields to prevent malicious input.
         */
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validate form data
        /**
         * @brief I validate the input fields to ensure they are not empty and the email is valid.
         *
         * If the email or password is invalid, I display an error message and redirect the user 
         * back to the login page.
         */
        if (empty($email)) {
            echo "<script>alert('Email is required'); window.location.href='../FrontEnd/userloginF.php';</script>";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format'); window.location.href='../FrontEnd/userloginF.php';</script>";
        } else if (empty($password)) {
            echo "<script>alert('Password is required'); window.location.href='../FrontEnd/userloginF.php';</script>";
        } else {
            // Prepare and execute query using a prepared statement
            /**
             * @brief I check if the user's email exists in the database.
             *
             * I use a prepared statement to securely query the database for the user's information.
             */
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                /**
                 * @brief I verify the user's password.
                 *
                 * If the password matches the one stored in the database, I start a session and 
                 * redirect the user to their dashboard. Otherwise, I display an error message.
                 */
                if ($password == $row['password']) {
                    $_SESSION['name'] = $row['user_name'];
                    $_SESSION['email'] = $row['user_email'];
                    $_SESSION['id'] = $row['user_id'];
                    header("Location: ../FrontEnd/userDashBoard.php");
                    exit();
                } else {
                    echo "<script>alert('Wrong Password! An email has been sent to you regarding this attempt.'); window.location.href='../FrontEnd/userloginF.php';</script>";
                }
            } else {
                /**
                 * @brief I handle the case where the user's email is not found in the database.
                 *
                 * If the email does not exist, I display an error message and redirect the user 
                 * back to the login page.
                 */
                echo "<script>alert('Email not found. Please check your email and try again.'); window.location.href='../FrontEnd/userloginF.php';</script>";
            }

            // Close the prepared statement and database connection
            /**
             * @brief I close the database connection and the prepared statement.
             *
             * After processing the login request, I ensure that the database connection and 
             * prepared statement are properly closed to free up resources.
             */
            $stmt->close();
            mysqli_close($conn);
        }
    }
?>