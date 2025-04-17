<?php
include "../BackEnd/connectDB.php";

$bookISBN = mysqli_real_escape_string($conn, $_POST['book_isbn']);
$newBookName = mysqli_real_escape_string($conn, $_POST['new_book_name']);


$checkBookQuery = "SELECT * FROM books WHERE book_isbn = '$bookISBN'";
$checkBookResult = mysqli_query($conn, $checkBookQuery);

if (mysqli_num_rows($checkBookResult) > 0) {

	$updateNameQuery = "UPDATE books SET book_name = '$newBookName' WHERE book_isbn = '$bookISBN'";
	if (mysqli_query($conn, $updateNameQuery)) {
		echo "<script>alert('Book Name updated successfully!');</script>";
	} else {
		echo "<script>alert('Error: Could not update the book name.');</script>";
	}
} else {
	echo "<script>alert('Error: Book not found.');</script>";
}

header("Location: ../FrontEnd/updateBookNameF.php");
exit;


mysqli_close($conn);
?>