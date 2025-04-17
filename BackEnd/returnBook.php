<?php

include "connectDB.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_name = trim($_POST['book_name'] ?? '');
    $user_name = trim($_POST['user_name'] ?? '');

    if (empty($book_name) || empty($user_name)) {
        die("<p style='text-align:center;color:red;'>Please provide both book name and user name.</p>");
    }


    $stmtUser = $conn->prepare("SELECT user_id FROM users WHERE user_name = ?");
    $stmtUser->bind_param("s", $user_name);
    $stmtUser->execute();
    $stmtUser->bind_result($user_id);
    $stmtUser->fetch();
    $stmtUser->close();

    if (!$user_id) {
        die("<p style='text-align:center;color:red;'>User not found. Please check the username.</p>");
    }

   
    $stmtBook = $conn->prepare("SELECT book_id FROM books WHERE book_name = ?");
    $stmtBook->bind_param("s", $book_name);
    $stmtBook->execute();
    $stmtBook->bind_result($book_id);
    $stmtBook->fetch();
    $stmtBook->close();

    if (!$book_id) {
        die("<p style='text-align:center;color:red;'>Book not found. Please check the book name.</p>");
    }


    $stmtReturn = $conn->prepare("UPDATE issued_books SET status = 1 WHERE book_id = ? AND user_id = ? AND status = 0");
    $stmtReturn->bind_param("ii", $book_id, $user_id);
    if ($stmtReturn->execute() && $stmtReturn->affected_rows > 0) {

        $stmtUpdateStock = $conn->prepare("UPDATE books SET number_of_copies = number_of_copies + 1 WHERE book_id = ?");
        $stmtUpdateStock->bind_param("i", $book_id);
        $stmtUpdateStock->execute();
        $stmtUpdateStock->close();

        echo "<p style='text-align:center;color:green;'>Book returned successfully!</p>";
    } else {
        echo "<p style='text-align:center;color:red;'>Failed to return the book. Please check the book name or status.</p>";
    }

    $stmtReturn->close();
}

$conn->close();
?>