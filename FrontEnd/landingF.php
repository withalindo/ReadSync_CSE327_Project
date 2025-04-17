<?php
/**
 * @file landingF.php
 * @brief This is the landing page for the application.
 *
 * I created this file to serve as the entry point for users and administrators. 
 * It provides options for logging in as a user or an admin and includes a link for new users to sign up.
 *
 * @details
 * - I used external CSS files for styling and a custom font for the design.
 * - The background features a looping video to enhance the visual appeal of the page.
 * - The page includes three main options:
 *   - Log in as a user.
 *   - Log in as an admin.
 *   - Sign up for new users.
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
    <title>Welcome</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/landing.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>

<body>
    <div class="background">
        <video autoplay loop muted playsinline class="background-video">
            <source src="../FrontEnd/Background_Images/landing.mp4" type="video/mp4">
            Browser does not support the video tag.
        </video>

        <div class="content">
            <a href="../FrontEnd/userloginF.php">
                <button class="user">
                    Log In as <br>USER
                </button>
            </a>

            <a href="../FrontEnd/adminLoginF.php">
                <button class="admin">
                    Log In as ADMIN
                </button>
            </a>

            <a class="link" href="signupF.php">NOT REGISTERED YET? SIGN UP!</a>
        </div>
    </div>
</body>

</html>