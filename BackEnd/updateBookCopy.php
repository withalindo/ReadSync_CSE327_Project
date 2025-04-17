<?php
/**
 * @file updateBookCopy.php
 * @brief This file handles updating the number of copies for a specific book in the database.
 *
 * I created this file to process requests for updating the number of copies of a book in the library system.
 * It retrieves the book details from the form, validates the input, and updates the database accordingly.
 *
 * @details
 * - I included the `connectDB.php` file to establish a connection to the database.
 * - The script retrieves the book name, ISBN, and the new number of copies from the form submission.
 * - I use `mysqli_real_escape_string` to sanitize the input and prevent SQL injection.
 * - The script checks if the book exists in the database using a `SELECT` query.
 * - If the book exists, I execute an `UPDATE` query to modify the number of copies.
 * - If the book does not exist, I display an error message.
 * - After processing, I redirect the user back to the update form page.
 * - Finally, I close the database connection to free up resources.
 *
 * @note 
 * - Ensure that the database contains the `books` table with the appropriate schema.
 * - This script assumes that the form submission includes valid and sanitized data.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */


include "../BackEnd/connectDB.php";

// Retrieve and sanitize form data
/**
 * @brief I retrieve and sanitize the book details from the form submission.
 *
 * I use `mysqli_real_escape_string` to sanitize the book name and ISBN, and `floatval` to ensure 
 * the new number of copies is a valid numeric value.
 */
$bookName = mysqli_real_escape_string($conn, $_POST['book_name']);
$bookISBN = mysqli_real_escape_string($conn, $_POST['book_isbn']);
$newBookCopies = floatval($_POST['new_book_copies']);

// Check if the book exists in the database
/**
 * @brief I check if the book exists in the database using its ISBN.
 *
 * I execute a `SELECT` query to verify if the book is present in the `books` table.
 */
$checkBookQuery = "SELECT * FROM books WHERE book_isbn = '$bookISBN'";
$checkBookResult = mysqli_query($conn, $checkBookQuery);

if (mysqli_num_rows($checkBookResult) > 0) {
    // Update the number of copies for the book
    /**
     * @brief I update the number of copies for the book if it exists.
     *
     * I execute an `UPDATE` query to modify the `number_of_copies` field in the `books` table.
     * If the query is successful, I display a success message. Otherwise, I display an error message.
     */
    $updateCopyQuery = "UPDATE books SET number_of_copies = $newBookCopies WHERE book_isbn = '$bookISBN'";
    if (mysqli_query($conn, $updateCopyQuery)) {
        echo "<script>alert('Book copies updated successfully!');</script>";
    } else {
        echo "<script>alert('Error: Could not update the book copies.');</script>";
    }
} else {
    // Handle the case where the book is not found
    /**
     * @brief I handle the case where the book does not exist in the database.
     *
     * If the book is not found, I display an error message to the user.
     */
    echo "<script>alert('Error: Book not found.');</script>";
}

// Redirect to the update form page
/**
 * @brief I redirect the user back to the update form page after processing.
 *
 * This ensures that the user can see the result of their action and make further updates if needed.
 */
header("Location: ../FrontEnd/updateBookCopyF.php");
exit;

// Close the database connection
/**
 * @brief I close the database connection to free up resources.
 *
 * After completing the operation, I ensure that the database connection is properly closed.
 */
mysqli_close($conn);
?>