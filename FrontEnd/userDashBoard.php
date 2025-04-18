<?php
/**
 * @file userDashBoard.php
 * @brief Frontend page for the user dashboard in the library system.
 *
 * This file provides the HTML structure and links to the CSS and JavaScript files for the user dashboard page.
 * It serves as a navigation hub for users to perform various actions, such as borrowing books, viewing borrowed books, and requesting books.
 * The page is styled using external CSS files and includes a side navigation menu for user functionalities.
 *
 * @details
 * - Main dashboard buttons navigate to book borrowing, borrowed books view, and book request pages.
 *
 * @note
 * - Ensure all linked pages (`borrowBookF.php`, `borrowedBooksF.php`, `request_bookF.php`, etc.) exist and are functional.
 * 
 * @date 2025-04-04
 * @author Karma
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/user_DashBoard.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>
<body>

    <div class="background">
        <div id="overlay" class="overlay"></div>
    </div>

    <div class="menuBar" onclick="openNav()">
        <div class="menuImage"></div>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="sideMenu"></div>

        <a href="../FrontEnd/userDashBoard.php" class="active"> 
            <button class="profileButton">
                User Dashboard
            </button>
        </a>

        <a href="../FrontEnd/libraryF.php">
            <button class="libraryButton">
                Library Stock
            </button>
        </a>

        <a href="../FrontEnd/landingF.php">
            <button class="logoutButton">
                Log Out
            </button>
        </a>    
    </div>

    <div class="main-content">
        <a href="../FrontEnd/borrowBookF.php"> <!-- Link to borrow page -->
            <button class="borrow morebutton">
                Borrow a Book
            </button>
        </a>

        <a href="../FrontEnd/borrowedBooksF.php"> <!-- Link to borrowed books page -->
            <button class="view morebutton">
                Borrowed Books
            </button>
        </a>

        <a href="../FrontEnd/request_bookF.php">
            <button class="request morebutton">
                Request a Book
            </button>
        </a>
    </div>

    <script>
        /**
         * @brief Opens the sidebar navigation.
         *
         * Expands the sidebar and displays the overlay.
         */
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
            document.getElementById("overlay").style.display = "block";
        }

        /**
         * @brief Closes the sidebar navigation.
         *
         * Collapses the sidebar and hides the overlay.
         */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</body>
</html>