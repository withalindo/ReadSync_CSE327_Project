<?php
/**
 * @file updateBookCopyF.php
 * @brief This is the front-end for updating the number of copies of a specific book.
 *
 * I created this file to provide a user interface for updating the number of copies of a book 
 * in the library system. It includes a form for inputting book details and a navigation menu 
 * for accessing other administrative features.
 *
 * @details
 * - I used external CSS files for styling and a custom font for the design.
 * - The page includes a side navigation menu with links to other update and management features.
 * - The form collects the following details:
 *   - Book Name
 *   - ISBN Number
 *   - New Number of Copies
 * - The form uses the `POST` method to securely send the data to the backend file `updateBookCopy.php`.
 * - I added JavaScript functions to handle the opening and closing of the side navigation menu.
 * - The page is fully responsive and ensures compatibility across different devices.
 *
 * @note 
 * - Ensure that the backend file `updateBookCopy.php` is properly configured to handle the form submission.
 * - This page is intended for use by administrators only.
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
    <title>Update Book Copy</title>
    <link rel="stylesheet" href="css/updateBookCopy.css">
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
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../FrontEnd/updateBookCopyF.php" class="active">
            <button class="updateBookCopies">Update Book Copy</button>
        </a>
        <a href="../FrontEnd/updatePanelF.php">
            <button class="update">Update Books</button>
        </a>
        <a href="../FrontEnd/updateBookPriceF.php">
            <button class="updatePrice">Update Book Price</button>
        </a>
        <a href="../FrontEnd/updateBookNameF.php">
            <button class="updateName">Update Book Name</button>
        </a>
        <a href="../FrontEnd/addBooksF.php">
            <button class="add">Add Book</button>
        </a>
        <a href="../FrontEnd/adminStockF.php">
            <button class="stockButton">Book Stock</button>
        </a>
        <a href="../FrontEnd/landingF.php">
            <button class="logout">Log Out</button>
        </a>
    </div>

    <!-- Form -->
    <form action="../BackEnd/updateBookCopy.php" method="POST" class="form-container">
        <h2 class="form-title">Update Book Copy</h2>
        <input type="text" id="bookName" name="book_name" placeholder="Book Name" required>
        <input type="number" id="ISBN" name="book_isbn" placeholder="Enter ISBN Number" required>
        <input type="number" id="new_book_copies" name="new_book_copies" placeholder="Adjust number of copies" required>
        <button type="submit" id="updateButton">Update The Book Copy</button>
    </form>

    <!-- JavaScript -->
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