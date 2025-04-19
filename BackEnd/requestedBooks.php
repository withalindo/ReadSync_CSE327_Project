/**
 * @file requestedBooks.php
 * @brief This is the script I use to display all book requests from the database.
 *
 * In this file, I fetch and display book request details from the database. 
 * I join multiple tables (books, authors, users, and book_requests) to retrieve 
 * all the necessary information, such as the book name, ISBN, author name, 
 * sender name, request status, and request date. If there are no requests, 
 * I display a message indicating that no requests were found.
 *
 * @author Anisha Ashfiya
 * @date April 19, 2025
 */

<?php

include "../BackEnd/connectDB.php"; 

if ($conn->connect_error) {
    /**
     * If the database connection fails, I terminate the script and display an error message.
     */
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    SELECT 
        br.request_id,
        b.book_name,
        b.book_isbn AS ISBN,
        a.author_name, -- Fetch author_name from authors table
        u.user_name AS sender_name,
        br.status,
        br.request_date
    FROM book_requests br
    INNER JOIN books b ON br.book_id = b.book_id
    INNER JOIN authors a ON b.author_id = a.author_id -- Join with authors table
    INNER JOIN users u ON br.user_id = u.user_id
    ORDER BY br.request_date DESC
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    /**
     * If there are book requests, I loop through the results and display them in a table.
     */
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='blue-text'>" . htmlspecialchars($row["request_id"]) . "</td>";
        echo "<td class='blue-text'>" . htmlspecialchars($row["book_name"]) . "</td>";
        echo "<td class='blue-text'>" . htmlspecialchars($row["ISBN"]) . "</td>";
        echo "<td class='blue-text'>" . htmlspecialchars($row["author_name"]) . "</td>"; // Display author_name
        echo "<td class='blue-text'>" . htmlspecialchars($row["sender_name"]) . "</td>";
        echo "<td class='blue-text'>" . htmlspecialchars($row["status"]) . "</td>";
        echo "<td class='blue-text'>" . htmlspecialchars($row["request_date"]) . "</td>";
        echo "</tr>";
    }
} else {
    /**
     * If no book requests are found, I display a message in the table.
     */
    echo "<tr><td colspan='7'>No requests found</td></tr>";
}

/**
 * After processing, I close the database connection.
 */
$conn->close();
?>
<!-- Still have some work on this page. -->