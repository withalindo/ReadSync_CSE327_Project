<?php
/**
 * @file request_book.php
 * @brief This is the script I use to handle book request submissions.
 *
 * In this file, I process book request submissions from users. I validate the input,
 * check if the book and user exist in the database, and ensure that duplicate requests
 * are not submitted. If everything is valid, I insert the request into the database.
 * I also handle errors and provide feedback to the user through alerts.
 *
 * @author Anisha
 * @date April 19, 2025
 */

<?php

include "../BackEnd/connectDB.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /**
     * I retrieve and sanitize the input data from the POST request.
     */
    $bookName = trim($_POST['bookName']);
    $ISBN = trim($_POST['ISBN']);
    $authorName = trim($_POST['authorName']);
    $senderName = trim($_POST['Sender_name']);

    /**
     * I check if any of the required fields are empty.
     * If they are, I alert the user and stop further processing.
     */
    if (empty($bookName) || empty($ISBN) || empty($authorName) || empty($senderName)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    /**
     * I check if the book exists in the database using its name and ISBN.
     */
    $stmt = $conn->prepare("SELECT book_id FROM books WHERE book_name = ? AND book_isbn = ?");
    $stmt->bind_param("ss", $bookName, $ISBN);
    $stmt->execute();
    $bookResult = $stmt->get_result();

    if ($bookResult->num_rows > 0) {
        $bookRow = $bookResult->fetch_assoc();
        $bookId = $bookRow['book_id'];

        /**
         * I check if the user exists in the database using their name.
         */
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_name = ?");
        $stmt->bind_param("s", $senderName);
        $stmt->execute();
        $userResult = $stmt->get_result();

        if ($userResult->num_rows > 0) {
            $userRow = $userResult->fetch_assoc();
            $userId = $userRow['user_id'];

            /**
             * I check if the user has already requested this book.
             */
            $stmt = $conn->prepare("SELECT * FROM book_requests WHERE book_id = ? AND user_id = ?");
            $stmt->bind_param("ii", $bookId, $userId);
            $stmt->execute();
            $requestResult = $stmt->get_result();

            if ($requestResult->num_rows > 0) {
                /**
                 * If the request already exists, I alert the user.
                 */
                echo "<script>alert('You have already requested this book!'); window.history.back();</script>";
            } else {
                /**
                 * If the request is new, I insert it into the database with a 'Pending' status.
                 */
                $stmt = $conn->prepare("INSERT INTO book_requests (book_id, user_id, status) VALUES (?, ?, 'Pending')");
                $stmt->bind_param("ii", $bookId, $userId);

                if ($stmt->execute()) {
                    echo "<script>alert('Request submitted successfully!'); window.location.href='/BIBLIO/frontend/userDashboard.html';</script>";
                } else {
                    echo "<script>alert('Error submitting request!'); window.history.back();</script>";
                }
            }
        } else {
            /**
             * If the user is not found, I alert them to register first.
             */
            echo "<script>alert('User not found. Please register first.'); window.history.back();</script>";
        }
    } else {
        /**
         * If the book is not found, I alert the user.
         */
        echo "<script>alert('Book not found in the library database.'); window.history.back();</script>";
    }

    /**
     * I close the prepared statement and database connection.
     */
    $stmt->close();
    $connection->close();
}
?>