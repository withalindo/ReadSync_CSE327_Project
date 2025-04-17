<?php  
/**
 * @file signupF.php
 * @brief This is the front-end for the Sign-Up page.
 *
 * I created this file to allow new users to register for the application. 
 * It provides a form where users can input their details, which are then sent to the backend for processing.
 *
 * @details
 * - I used external CSS files for styling and a custom font for the design.
 * - The page includes a "BACK" button that redirects users to the landing page.
 * - The form collects the following user details:
 *   - Name
 *   - Email
 *   - Date of Birth
 *   - Phone Number
 *   - Username
 *   - Password
 * - The form uses the `POST` method to securely send the data to the backend file `signup.php`.
 * - The page is fully responsive and ensures compatibility across different devices.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>

<body>
    <div class="background">
        <a id="backLink" href="landingF.php">
            <p id="backButton">BACK</p>
        </a>
        <form action="../BackEnd/signup.php" method="post">
            <input type="text" id="name" name="name" placeholder="Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="date" id="DOB" name="DOB" placeholder="Date of Birth" required>
            <input type="text" id="mobile" name="mobile" placeholder="Phone" required>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="submit" id="signUpButton" name="signup" value="SIGN UP">
        </form>
    </div>
</body>

</html>