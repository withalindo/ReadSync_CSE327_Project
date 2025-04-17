<?php
/**
 * @file adminLoginF.php
 * @brief This is the front-end for the Admin Login page.
 *
 * I created this file to provide the HTML structure and functionality for the admin login page.
 * It includes a login form for administrators to access the system and a motivational quote section.
 *
 * @details
 * - I used external CSS files for styling and a custom font for the design.
 * - The login form sends the admin's credentials (Admin ID and Password) to the backend file 
 *   `adminlogin.php` for authentication.
 * - The right section displays rotating motivational quotes, which I implemented using JavaScript.
 * - The page is responsive and includes a "BACK" button to navigate to the landing page.
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/adminlogin.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="overlay">
                <form action="../BackEnd/adminlogin.php" method="POST">
                    <input type="text" name="admin_id" id="admin_id" placeholder="Admin ID" required>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="submit" name="login" id="loginButton" value="LOGIN">
                </form>
            </div>
        </div>
        <div class="right">
            <div class="quote">
                <p id="quoteText">"The best way to predict the future is to create it."</p>
            </div>
            <a href="landingF.php" id="backButton">BACK</a>
        </div>
    </div>

    <script>
        /**
         * @brief I wrote this script to display rotating motivational quotes.
         *
         * The script cycles through an array of quotes every 3 seconds and updates the text content
         * of the quote section dynamically.
         */
        const quotes = [
            "The best way to predict the future is to create it.",
            "Success is not the key to happiness. Happiness is the key to success.",
            "Don’t watch the clock; do what it does. Keep going.",
            "The only limit to our realization of tomorrow is our doubts of today."
        ];

        let quoteIndex = 0;
        const quoteText = document.getElementById('quoteText');

        setInterval(() => {
            quoteIndex = (quoteIndex + 1) % quotes.length;
            quoteText.textContent = quotes[quoteIndex];
        }, 3000);
    </script>
</body>
</html>