<?php
include "../BackEnd/connectDB.php";


$bookName = mysqli_real_escape_string($conn, $_POST['book_name']);
$bookISBN = mysqli_real_escape_string($conn, $_POST['book_isbn']);
$newBookPrice = floatval($_POST['new_book_price']); // Use floatval for price


$checkBookQuery = "SELECT * FROM books WHERE book_isbn = '$bookISBN'";
$checkBookResult = mysqli_query($conn, $checkBookQuery);

if (mysqli_num_rows($checkBookResult) > 0) {
    // Update the price of the book
    $updatePriceQuery = "UPDATE books SET book_price = $newBookPrice WHERE book_isbn = '$bookISBN'";
    if (mysqli_query($conn, $updatePriceQuery)) {
        echo "<script>alert('Book price updated successfully!');</script>";
    } else {
        echo "<script>alert('Error: Could not update the book price.');</script>";
    }
} else {
    echo "<script>alert('Error: Book not found.');</script>";
}


header("Location: ../FrontEnd/updateBookPriceF.php");
exit;


mysqli_close($conn);
?>