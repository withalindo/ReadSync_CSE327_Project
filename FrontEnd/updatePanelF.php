<?php
/**
 * @file updatePanelF.php
 * @brief This is the front-end for the Update Panel.
 *
 * I created this file to provide a centralized interface for administrators to manage 
 * and update book-related information in the library system. It includes navigation 
 * options for various update and management features.
 *
 * @details
 * - I used external CSS files for styling and a custom font for the design.
 * - The page includes a side navigation menu with links to:
 *   - Update Books
 *   - View Book Stock
 *   - Add Books
 *   - Update Book Copies
 *   - Update Book Name
 *   - Update Book Price
 *   - Delete Books
 *   - Log Out
 * - I added JavaScript functions to handle the opening and closing of the side navigation menu.
 * - The page is fully responsive and ensures compatibility across different devices.
 *
 * @note 
 * - This page is intended for use by administrators only.
 * - Ensure that the linked backend files are properly configured to handle the respective actions.
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
    <title>Updation Panel</title>
    <link rel="stylesheet" href="css/updatePanel.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>
<body>

    <!-- Background -->
    <div class="background">
        <div class="overlay"></div>
    </div>

    <!-- Menu Bar -->
    <div class="menuBar">
        <div class="menuImage" onclick="openNav()"></div>
    </div>

    <!-- Side Navigation -->
    <div class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <a href="../FrontEnd/updatePanelF.php" class="active">
            <button class="update">Update Books</button>
        </a>

        <a href="../FrontEnd/adminStockF.php">
            <button class="stockButton">Book Stock</button>
        </a>

        <a href="../FrontEnd/addBooksF.php">
            <button class="add">Add Books</button>
        </a>

        <a href="../FrontEnd/updateBookCopyF.php">
            <button class="updateBookCopies">Update Book Copy</button>
        </a>

        <a href="../FrontEnd/updateBookNameF.php">
            <button class="updateName">Update Book Name</button>
        </a>

        <a href="../FrontEnd/updateBookPriceF.php">
            <button class="updatePrice">Update Book Price</button>
        </a>

        <a href="../FrontEnd/deleteBookF.php">
            <button class="deleteBook">Delete Book</button>
        </a>

        <a href="../FrontEnd/landingF.php">
            <button class="logout">Log Out</button>
        </a>
    </div>

    <!-- JavaScript -->
    <script>
        /**
         * @brief I wrote this function to open the side navigation menu.
         *
         * When called, it expands the side navigation menu to a width of 300px 
         * and displays the background overlay.
         */
        function openNav() {
            document.querySelector(".sidenav").style.width = "300px";
            document.querySelector(".overlay").style.display = "block";
        }

        /**
         * @brief I wrote this function to close the side navigation menu.
         *
         * When called, it collapses the side navigation menu to a width of 0 
         * and hides the background overlay.
         */
        function closeNav() {
            document.querySelector(".sidenav").style.width = "0";
            document.querySelector(".overlay").style.display = "none";
        }
    </script>

</body>
</html>