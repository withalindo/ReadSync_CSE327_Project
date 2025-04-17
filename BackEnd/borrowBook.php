<?php
/**
 * @file borrowBook.php
 * @brief Script to handle book borrowing functionality.
 *
 * This script allows users to borrow books by providing their username and selecting books.
 * It validates user input, checks for user existence, verifies book availability, and updates
 * the database accordingly.
 *
 * @date 2025-04-04
 * @author Karma
 */

include "../BackEnd/connectDB.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /**
     * @var string $user_name The username of the user borrowing books.
     * @var array $book_ids An array of book IDs selected by the user.
     */
    $user_name = trim($_POST['user_name'] ?? '');
    $book_ids = $_POST['books'] ?? [];

    if ($user_name && !empty($book_ids)) {
        /**
         * @brief Fetches the user ID based on the provided username.
         *
         * Queries the `users` table to retrieve the user ID for the given username.
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
            die("<p style='text-align:center;color:red;'>User not found. Please register first.</p>");
        }

        $inserted_books = [];
        $total_price = 0;

        foreach ($book_ids as $book_id) {
            /**
             * @brief Checks the availability of the selected book.
             *
             * Queries the `books` table to fetch details such as book name, price, and stock.
             */
            $stmtCheck = $conn->prepare("SELECT book_name, book_price, number_of_copies FROM books WHERE book_id = ?");
            $stmtCheck->bind_param("i", $book_id);
            $stmtCheck->execute();
            $stmtCheck->store_result(); // Store the result set to avoid "Commands out of sync" error
            $stmtCheck->bind_result($book_name, $book_price, $number_of_copies);

            if ($stmtCheck->fetch()) {
                if ($number_of_copies > 0) {
                    /**
                     * @brief Issues the book to the user.
                     *
                     * Inserts a record into the `issued_books` table and decrements the stock
                     * in the `books` table.
                     */
                    $stmtIssue = $conn->prepare("INSERT INTO issued_books (book_id, user_id) VALUES (?, ?)");
                    $stmtIssue->bind_param("ii", $book_id, $user_id);
                    $stmtIssue->execute();
                    $stmtIssue->close();

                    $stmtUpdate = $conn->prepare("UPDATE books SET number_of_copies = number_of_copies - 1 WHERE book_id = ?");
                    $stmtUpdate->bind_param("i", $book_id);
                    $stmtUpdate->execute();
                    $stmtUpdate->close();

                    $inserted_books[] = $book_name;
                    $total_price += $book_price;
                } else {
                    /**
                     * @brief Handles the case where the book is out of stock.
                     *
                     * Displays an error message if the selected book has no available copies.
                     */
                    echo "<p style='text-align:center;color:red;'>Book '$book_name' is out of stock.</p>";
                }
            } else {
                /**
                 * @brief Handles the case where the book ID is invalid.
                 *
                 * Displays an error message if the book ID does not exist in the database.
                 */
                echo "<p style='text-align:center;color:red;'>Book with ID $book_id not found.</p>";
            }
            $stmtCheck->close();
        }

        if (!empty($inserted_books)) {
            /**
             * @brief Displays a success message for issued books.
             *
             * Outputs the list of successfully issued books and the total price.
             */
            echo "<div style='text-align: center; margin-top: 50px;'>";
            echo "<div style='display: inline-block; padding: 20px; border: 2px solid #ddd; border-radius: 10px; background-color: #f9f9f9;'>";
            echo "<h2 style='font-size: 32px; color: green;'>Books Issued Successfully!</h2>";
            echo "<p style='font-size: 20px;'><strong>Books:</strong> " . implode(', ', $inserted_books) . "</p>";
            echo "<p style='font-size: 20px;'><strong>Total Price:</strong> Tk" . $total_price . "</p>";
            echo "</div></div>";
        }
    } else {
        /**
         * @brief Handles missing input.
         *
         * Displays an error message if the username or book selection is missing.
         */
        echo "<p style='text-align:center;color:red;'>Please enter a username and select at least one book.</p>";
    }
}

/**
 * @brief Closes the database connection.
 */
$conn->close();
?>