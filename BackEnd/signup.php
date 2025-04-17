<?php
/**
 * @file signup.php
 * @brief This is the backend file for handling user registration.
 *
 * I created this file to process the data submitted from the sign-up form. 
 * It validates the input, sanitizes the data, and inserts the new user's information into the database.
 *
 * @details
 * - I included the `connectDB.php` file to establish a connection to the database.
 * - The script retrieves the form data using the `POST` method and sanitizes it to prevent malicious input.
 * - I implemented input validation to ensure that all required fields are filled.
 * - If the input is valid, the script uses a prepared statement to securely insert the user's data into the database.
 * - If the registration is successful, I display a success message and redirect the user to the login page.
 * - If there is an error during the process, I display an appropriate error message and redirect the user back to the landing page.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        include("connectDB.php");

        // Retrieve and sanitize form data
        /**
         * @brief I retrieve and sanitize the user's input.
         *
         * I use PHP's `filter_input` function to sanitize the input fields and ensure that the data 
         * is safe for processing. For the date of birth, I assume the input is already sanitized.
         */
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $dob = $_POST['DOB']; // Assuming date input is already sanitized
        $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        // Input validation
        /**
         * @brief I validate the input fields to ensure they are not empty.
         *
         * If any required field is empty, I display an alert message and redirect the user back 
         * to the landing page.
         */
        if (empty($username)) {
            echo "<script>alert('Username is required'); window.location.href='../FrontEnd/landingF.php';</script>";
        } else if (empty($name)) {
            echo "<script>alert('Name is required'); window.location.href='../FrontEnd/landingF.php';</script>";
        } else if (empty($email)) {
            echo "<script>alert('Email is required'); window.location.href='../FrontEnd/landingF.php';</script>";
        } else if (empty($password)) {
            echo "<script>alert('Password is required'); window.location.href='../FrontEnd/landingF.php';</script>";
        } else {
            // Insert data into the database
            /**
             * @brief I insert the user's data into the database.
             *
             * I use a prepared statement to securely insert the user's information into the `users` table.
             * If the insertion is successful, I display a success message and redirect the user to the login page.
             * If there is an error, I display an error message and redirect the user back to the landing page.
             */
            $statement = $conn->prepare("INSERT INTO users (user_name, user_email, DOB, user_mobile, password) VALUES (?, ?, ?, ?, ?)");
            $statement->bind_param("sssss", $username, $email, $dob, $mobile, $password);

            if ($statement->execute()) {
                echo "<script>alert('Congratulations! Your registration is successful! You can now log in.'); window.location.href='../FrontEnd/userloginF.php';</script>";
            } else {
                echo "<script>alert('Something went wrong. <br>Error: " . $statement->error . "'); window.location.href='../FrontEnd/landingF.php';</script>";
            }

            // Close the statement and database connection
            /**
             * @brief I close the database connection and the prepared statement.
             *
             * After processing the registration, I ensure that the database connection and the prepared 
             * statement are properly closed to free up resources.
             */
            $statement->close();
            mysqli_close($conn);
        }
    }
?>