<?php
/**
 * @file addbooks.php
 * @brief This file handles the backend logic for adding new books to the library system.
 *
 * I created this file to process form submissions for adding new books. 
 * It validates the input, checks for the existence of authors and categories, 
 * and inserts the book details into the database.
 *
 * @details
 * - I included the `connectDB.php` file to establish a connection to the database.
 * - The script retrieves the book details, author details, and category details from the form submission.
 * - I use `mysqli_real_escape_string` to sanitize the input and prevent SQL injection.
 * - The script checks if the author and category already exist in the database:
 *   - If the author does not exist, I add the author to the `authors` table.
 *   - If the category does not exist, I add the category to the `categories` table.
 * - After ensuring the author and category exist, I insert the book details into the `books` table.
 * - If any operation fails, I display an appropriate error message using JavaScript alerts.
 * - Finally, I close the database connection to free up resources.
 *
 * @note 
 * - Ensure that the database contains the `authors`, `categories`, and `books` tables with the appropriate schema.
 * - This file is intended for use by administrators only.
 *
 * @author 
 * withalindo
 * @date April 17, 2025
 */


include "../BackEnd/connectDB.php"; 

// Retrieve and sanitize form data
/**
 * @brief I retrieve and sanitize the book, author, and category details from the form submission.
 *
 * I use `mysqli_real_escape_string` to sanitize the input fields and `intval` or `floatval` 
 * to ensure numeric values are properly handled.
 */
$book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
$book_isbn = mysqli_real_escape_string($conn, $_POST['book_isbn']);
$author_id = intval($_POST['author_id']);
$author_name = mysqli_real_escape_string($conn, $_POST['author_name']); 
$category_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
$cat_id = intval($_POST['cat_id']);
$no_of_copies = intval($_POST['no_of_copies']);
$book_price = floatval($_POST['book_price']);

// Validate input data
/**
 * @brief I validate the number of copies and book price to ensure they are non-negative.
 *
 * If the number of copies or book price is negative, I display an error message and stop execution.
 */
if ($no_of_copies < 0 || $book_price < 0) {
    echo "<script>alert('Number of copies and book price must be non-negative.');</script>";
    exit;
}

// Check if the author exists in the database
/**
 * @brief I check if the author exists in the `authors` table.
 *
 * If the author does not exist, I insert the author into the `authors` table.
 */
$check_author_query = "SELECT * FROM authors WHERE author_id = $author_id";
$check_author_result = mysqli_query($conn, $check_author_query);

if (mysqli_num_rows($check_author_result) == 0) {
    $author_query = "INSERT INTO authors (author_id, author_name) 
                     VALUES ($author_id, '$author_name')";
    if (!mysqli_query($conn, $author_query)) {
        echo "<script>alert('Error: Could not add the author.');</script>";
        exit;
    }
}

// Check if the category exists in the database
/**
 * @brief I check if the category exists in the `categories` table.
 *
 * If the category does not exist, I insert the category into the `categories` table.
 */
$check_category_query = "SELECT * FROM categories WHERE category_id = $cat_id AND category_name = '$category_name'";
$check_category_result = mysqli_query($conn, $check_category_query);

if (mysqli_num_rows($check_category_result) == 0) {
    $category_query = "INSERT INTO categories (category_id, category_name) 
                       VALUES ($cat_id, '$category_name')";
    if (!mysqli_query($conn, $category_query)) {
        echo "<script>alert('Error: Could not add the category.');</script>";
        exit;
    }
}

// Insert the book into the database
/**
 * @brief I insert the book details into the `books` table.
 *
 * After ensuring the author and category exist, I insert the book details into the `books` table.
 * If the operation is successful, I display a success message. Otherwise, I display an error message.
 */
$book_query = "INSERT INTO books (book_name, book_isbn, author_id, category_id, number_of_copies, book_price) 
               VALUES ('$book_name', '$book_isbn', $author_id, $cat_id, $no_of_copies, $book_price)";
               
if (mysqli_query($conn, $book_query)) {
    echo "<script>alert('Book added successfully!');</script>";
} else {
    echo "<script>alert('Error: Could not add the book.');</script>";
}

// Close the database connection
/**
 * @brief I close the database connection to free up resources.
 *
 * After completing the operation, I ensure that the database connection is properly closed.
 */
mysqli_close($conn);
?>