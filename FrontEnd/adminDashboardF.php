<?php
/**
 * @file adminDashboardF.php
 * @brief This is the front-end for the Admin Dashboard.
 *
 * I created this file to provide the HTML structure and functionality for the admin dashboard.
 * It includes a side navigation menu, buttons for navigating to different sections, and 
 * JavaScript functions to handle the menu's open and close actions.
 *
 * @details
 * - I used external CSS files for styling and a custom font for the design.
 * - The side navigation menu allows admins to access the dashboard, requested books, book stock, 
 *   and an update panel. There's also a logout option.
 * - The page is responsive and includes a background overlay that appears when the side menu is open.
 * - I added JavaScript functions to handle the menu's behavior dynamically.
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/adminDashboard.css">
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
        <div class="sideMenu">
            <a href="../FrontEnd/adminDashboardF.php" class="active">
                <button class="dashboardButton">Admin Dashboard</button>
            </a>
            <a href="../FrontEnd/requestedBooksF.php">
                <button class="requestsButton">Requested Books</button>
            </a>
            <a href="../FrontEnd/adminStockF.php">
                <button class="stockButton">Book Stock</button>
            </a>
            <a href="../FrontEnd/updatePanelF.php">
                <button class="stockButton">Update Panel</button>
            </a>
            <a href="../FrontEnd/landingF.php">
                <button class="logoutButton">Log Out</button>
            </a>
        </div>
    </div>

    <div class="main-content">
        <a href="../FrontEnd/adminStockF.php">
            <button class="stock morebutton">
                Book<br>Stock
            </button>
        </a>
        <a href="../FrontEnd/requestedBooksF.php">
            <button class="requests morebutton">
                Requested Books
            </button>
        </a>
    </div>

    <script>
        /**
         * @brief I wrote this function to open the side navigation menu.
         *
         * When called, it expands the side navigation menu to a width of 300px 
         * and displays the background overlay.
         */
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
            document.getElementById("overlay").style.display = "block";
        }
          
        /**
         * @brief I wrote this function to close the side navigation menu.
         *
         * When called, it collapses the side navigation menu to a width of 0 
         * and hides the background overlay.
         */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("overlay").style.display = "none";
        }
    </script>

</body>
</html>