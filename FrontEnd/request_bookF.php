/**
 * @file request_bookF.php
 * @brief This is the form I use to submit book requests.
 *
 * In this file, I create a user-friendly form that allows users to submit book requests.
 * The form collects details such as the book name, ISBN, author name, and sender name.
 * Once the form is filled out, it sends the data to the backend script `request_book.php`
 * for processing. I also include a "BACK" button to navigate back to the user dashboard.
 *
 * @author Anisha Ashfiya
 * @date April 19, 2025
 */

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Request</title>

    <!-- I include stylesheets for normalizing styles and custom form design -->
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/request.css" />
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet" />
  </head>
  <body>
    <form action="../BackEnd/request_book.php" method="post">
      <!-- I provide a "BACK" button to return to the user dashboard -->
      <a href="../FrontEnd/userDashBoard.php" id="backButton">BACK</a>

      <!-- I collect the full book name from the user -->
      <input
        type="text"
        id="bookName"
        name="bookName"
        placeholder="Full Book Name"
        required
      />

      <!-- I collect the ISBN number of the book -->
      <input
        type="text"
        id="ISBN"
        name="ISBN"
        placeholder="ISBN Number of The Book (Can be found online)"
        required
      />

      <!-- I collect the full name of the author -->
      <input
        type="text"
        id="authorName"
        name="authorName"
        placeholder="Full Name of the Author"
        required
      />

      <!-- I collect the sender's name -->
      <input
        type="text"
        id="Sender_name"
        name="Sender_name"
        placeholder="Sender Name"
        required
      />

      <!-- I provide a submit button to send the form data -->
      <input type="submit" id="submitRequestButton" value="SUBMIT" />
    </form>
  </body>
</html>