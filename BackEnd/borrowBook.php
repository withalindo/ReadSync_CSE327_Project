<?php
include "../BackEnd/connectDB.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = trim($_POST['user_name'] ?? '');
    $book_ids = $_POST['books'] ?? [];

    if ($user_name && !empty($book_ids)) {
      
        $stmtUser = $conn->prepare("SELECT user_id FROM users WHERE user_name = ?");
        $stmtUser->bind_param("s", $user_name);
        $stmtUser->execute();
        $stmtUser->bind_result($user_id);
        $stmtUser->fetch();
        $stmtUser->close();

        if (!$user_id) {
            die("<p style='text-align:center;color:red;'>User not found. Please register first.</p>");
        }

        $inserted_books = [];
        $total_price = 0;

        foreach ($book_ids as $book_id) {
           
            $stmtCheck = $conn->prepare("SELECT book_name, book_price, number_of_copies FROM books WHERE book_id = ?");
            $stmtCheck->bind_param("i", $book_id);
            $stmtCheck->execute();
            $stmtCheck->store_result(); 
            $stmtCheck->bind_result($book_name, $book_price, $number_of_copies);

            if ($stmtCheck->fetch()) {
                if ($number_of_copies > 0) {
                    
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
                    echo "<p style='text-align:center;color:red;'>Book '$book_name' is out of stock.</p>";
                }
            } else {
                echo "<p style='text-align:center;color:red;'>Book with ID $book_id not found.</p>";
            }
            $stmtCheck->close();
        }

       
        if (!empty($inserted_books)) {
            echo "<div style='text-align: center; margin-top: 50px;'>";
            echo "<div style='display: inline-block; padding: 20px; border: 2px solid #ddd; border-radius: 10px; background-color: #f9f9f9;'>";
            echo "<h2 style='font-size: 32px; color: green;'>Books Issued Successfully!</h2>";
            echo "<p style='font-size: 20px;'><strong>Books:</strong> " . implode(', ', $inserted_books) . "</p>";
            echo "<p style='font-size: 20px;'><strong>Total Price:</strong> Tk" . $total_price . "</p>";
            echo "</div></div>";
        }
    } else {
        echo "<p style='text-align:center;color:red;'>Please enter a username and select at least one book.</p>";
    }
}

$conn->close();
?>