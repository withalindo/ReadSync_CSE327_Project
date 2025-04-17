<?php
/**
 * @file userloginF.php
 * @brief This is the front-end for the User Login page.
 *
 * I created this file to provide a user interface for users to log in to the library system. 
 * It includes a login form where users can input their credentials, which are sent to the backend 
 * for authentication.
 *
 * @details
 * - I included the `userlogin.php` backend file to handle the login functionality.
 * - The page includes a "BACK" button to navigate back to the landing page.
 * - The login form collects the following details:
 *   - Email
 *   - Password
 * - The form uses the `POST` method to securely send the data to the backend file `userlogin.php`.
 * - I used external CSS files for styling and a custom font for the design.
 * - The page is fully responsive and ensures compatibility across different devices.
 *
 * @note 
 * - Ensure that the backend file `userlogin.php` is properly configured to handle the login requests.
 * - This page is intended for use by registered users only.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */

include("../BackEnd/userlogin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/userlogin.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>

<body>
    <!-- Background -->
    <div class="background">
        <!-- Login Form -->
        <form action="../BackEnd/userlogin.php" method="post">
            <!-- Back Button -->
            <a href="landingF.php">
                <p id="backButton">BACK</p>
            </a>
            <h1>USER LOGIN</h1>

            <!-- Input Fields -->
            <input type="text" id="username" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <!-- Submit Button -->
            <input type="submit" id="loginButton" name="login" value="LOGIN">
        </form>
    </div>
</body>

</html>