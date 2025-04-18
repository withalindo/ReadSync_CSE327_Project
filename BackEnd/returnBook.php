<?php
/**
 * @file returnBook.php
 * @brief Script to handle book return functionality.
 *
 * This script enables users to return borrowed books by providing the book name and their username.
 * It validates the input, checks if the user and book exist in the database, and updates the
 * `issued_books` table to reflect the return. Additionally, it increments the stock of the returned book.
 *
 * @details
 * This script performs the following operations:
 * - Validates user input.
 * - Checks if the user and book exist in the database.
 *
 * @note
 * - Ensure `connectDB.php` correctly establishes the database connection.
 *
 * @date 2025-04-04
 * @author Karma
 */


include "connectDB.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /**
     * @var string $book_name The name of the book being returned.
     * @var string $user_name The username of the user returning the book.
     */
    $book_name = trim($_POST['book_name'] ?? '');
    $user_name = trim($_POST['user_name'] ?? '');

    // Validate input
    /**
     * @brief Validates input fields.
     *
     * Ensures that both the book name and username are provided. If either field is empty,
     * an error message is displayed, and the script exits.
     */
    if (empty($book_name) || empty($user_name)) {
        die("<p style='text-align:center;color:red;'>Please provide both book name and user name.</p>");
    }

    // Fetch user ID
    /**
     * @brief Fetches the user ID for the given username.
     *
     * Queries the `users` table to retrieve the user ID associated with the provided username.
     */
    $stmtUser = $conn->prepare("SELECT user_id FROM users WHERE user_name = ?");
    $stmtUser->bind_param("s", $user_name);
    $stmtUser->execute();
    $stmtUser->bind_result($user_id);
    $stmtUser->fetch();
    $stmtUser->close();

    if (!$user_id) {
        /**
         * @brief Handles the case where the user is not found.
         *
         * Displays an error message if the username does not exist in the database.
         */
        die("<p style='text-align:center;color:red;'>User not found. Please check the username.</p>");
    }

    // Fetch book ID
    /**
     * @brief Fetches the book ID for the given book name.
     *
     * Queries the `books` table to retrieve the book ID associated with the provided book name.
     */
    $stmtBook = $conn->prepare("SELECT book_id FROM books WHERE book_name = ?");
    $stmtBook->bind_param("s", $book_name);
    $stmtBook->execute();
    $stmtBook->bind_result($book_id);
    $stmtBook->fetch();
    $stmtBook->close();

    if (!$book_id) {
        /**
         * @brief Handles the case where the book is not found.
         *
         * Displays an error message if the book name does not exist in the database.
         */
        die("<p style='text-align:center;color:red;'>Book not found. Please check the book name.</p>");
    }

    // Mark the book as returned
    /**
     * @brief Updates the `issued_books` table to mark the book as returned.
     *
     * Sets the `status` field to 1 for the specified book ID and user ID, indicating that the book
     * has been returned. Only updates records where the current status is 0 (borrowed).
     */
    $stmtReturn = $conn->prepare("UPDATE issued_books SET status = 1 WHERE book_id = ? AND user_id = ? AND status = 0");
    $stmtReturn->bind_param("ii", $book_id, $user_id);
    if ($stmtReturn->execute() && $stmtReturn->affected_rows > 0) {
        // Increment the stock of the book
        /**
         * @brief Increments the stock of the returned book.
         *
         * Updates the `books` table to increase the `number_of_copies` field by 1 for the returned book.
         */
        $stmtUpdateStock = $conn->prepare("UPDATE books SET number_of_copies = number_of_copies + 1 WHERE book_id = ?");
        $stmtUpdateStock->bind_param("i", $book_id);
        $stmtUpdateStock->execute();
        $stmtUpdateStock->close();

        /**
         * @brief Confirms successful book return.
         *
         * Displays a success message indicating that the book has been returned successfully.
         */
        echo "<p style='text-align:center;color:green;'>Book returned successfully!</p>";
    } else {
        /**
         * @brief Handles errors during the return process.
         *
         * Displays an error message if the book could not be marked as returned. This may occur
         * if the book is not currently borrowed or if there is an issue with the query.
         */
        echo "<p style='text-align:center;color:red;'>Failed to return the book. Please check the book name or status.</p>";
    }

    $stmtReturn->close();
}

// Close the database connection
/**
 * @brief Closes the database connection.
 *
 * Ensures that the database connection is properly closed after the script
 * has finished executing.
 */
$conn->close();
?>