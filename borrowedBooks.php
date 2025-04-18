<?php

include "connectDB.php";

/**
 * @brief Fetches the user ID for a given username.
 * @param string $user_name The username to fetch the user ID for.
 * @param mysqli $conn The database connection object.
 * @return int|null The user ID if found, or null if not found.
 */
function getUserId($user_name, $conn) {
    $stmtUser = $conn->prepare("SELECT user_id FROM users WHERE user_name = ?");
    $stmtUser->bind_param("s", $user_name);
    $stmtUser->execute();
    $stmtUser->bind_result($user_id);
    $stmtUser->fetch();
    $stmtUser->close();
    return $user_id;
}

/**
 * @brief Fetches borrowed books for a given user ID.
 * @param int $user_id The user ID to fetch borrowed books for.
 * @param mysqli $conn The database connection object.
 * @return array An array of borrowed books or an empty array if none are found.
 */
function getBorrowedBooks($user_id, $conn) {
    $sql = "
        SELECT 
            issued_books.book_id, 
            books.book_name, 
            issued_books.issue_date, 
            issued_books.status
        FROM issued_books
        INNER JOIN books ON issued_books.book_id = books.book_id
        WHERE issued_books.user_id = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $borrowedBooks = [];
    while ($row = $result->fetch_assoc()) {
        $borrowedBooks[] = [
            "book_id" => $row['book_id'],
            "book_name" => $row['book_name'],
            "issue_date" => $row['issue_date'],
            "status" => $row['status'] == 0 ? "Borrowed" : "Returned"
        ];
    }

    $stmt->close();
    return $borrowedBooks;
}

// Main logic
$user_name = trim($_POST['user_name'] ?? '');

if (empty($user_name)) {
    echo "<tr><td colspan='4' style='text-align:center;color:red;'>Please enter a username.</td></tr>";
    exit;
}

$user_id = getUserId($user_name, $conn);

if (!$user_id) {
    echo "<tr><td colspan='4' style='text-align:center;color:red;'>User not found. Please check the username.</td></tr>";
    exit;
}

$borrowedBooks = getBorrowedBooks($user_id, $conn);

if (!empty($borrowedBooks)) {
    foreach ($borrowedBooks as $book) {
        echo "<tr>
                <td>{$book['book_id']}</td>
                <td>{$book['book_name']}</td>
                <td>{$book['issue_date']}</td>
                <td>{$book['status']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4' style='text-align:center;'>No borrowed books found for this user.</td></tr>";
}

$conn->close();
?>