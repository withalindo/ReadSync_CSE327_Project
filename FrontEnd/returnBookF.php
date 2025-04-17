<?php
/**
 * @file returnBookF.php
 * @brief Frontend page for returning a borrowed book.
 *
 * This file provides the HTML structure and links to the CSS and JavaScript files for the return book page.
 * It includes a form for users to return a borrowed book by entering their username and the book name.
 * The form submits the data to the backend script `returnBook.php` for processing.
 * The page is styled using external CSS files.
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
    <title>Return Book</title>
    <link rel="stylesheet" href="../FrontEnd/css/returnBook.css">
</head>
<body>

    <div class="overlay"></div>
    <div class="container">
        <h1>Return Book</h1>
        <form action="../BackEnd/returnBook.php" method="POST">
            <input type="text" name="user_name" placeholder="Enter User Name" required>
            <input type="text" name="book_name" placeholder="Enter Book Name" required>
            <button type="submit">Return The Book</button>
        </form>
    </div>

</body>
</html>