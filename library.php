<?php

include "connectDB.php"; 


$sql = "
    SELECT 
        books.book_isbn, 
        books.book_name, 
        authors.author_name, 
        categories.category_name, 
        books.book_price
    FROM books
    INNER JOIN authors ON books.author_id = authors.author_id
    INNER JOIN categories ON books.category_id = categories.category_id
";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['book_isbn']}</td>
                <td>{$row['book_name']}</td>
                <td>{$row['author_name']}</td>
                <td>{$row['category_name']}</td>
                <td>{$row['book_price']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No data found</td></tr>";
}


$conn->close();
?>