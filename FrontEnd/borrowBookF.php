<?php
 include "../BackEnd/connectDB.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Books</title>
    <link rel="stylesheet" href="css/borrowBook.css">
</head>
<body>
    <h2>Select Books For Borrowing</h2>
    <form action="../BackEnd/borrowBook.php" method="POST">
        <?php
        $result = $conn->query("SELECT book_id, book_name, book_price FROM books");
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Select</th><th>Book Name</th><th>Price</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='books[]' value='" . $row["book_id"] . "'></td>";
                echo "<td>" . htmlspecialchars($row["book_name"]) . "</td>";
                echo "<td>Tk" . $row["book_price"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align:center;'>No books available.</p>";
        }
        ?>
        <input type="text" name="user_name" placeholder="Enter your user name" required>
        <input type="submit" value="Next">
    </form>
</body>
</html>
