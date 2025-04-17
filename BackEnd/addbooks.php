<?php
include "../BackEnd/connectDB.php"; 


$book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
$book_isbn = mysqli_real_escape_string($conn, $_POST['book_isbn']);
$author_id = intval($_POST['author_id']);
$author_name = mysqli_real_escape_string($conn, $_POST['author_name']); 
$category_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
$cat_id = intval($_POST['cat_id']);
$no_of_copies = intval($_POST['no_of_copies']);
$book_price = floatval($_POST['book_price']);


if ($no_of_copies < 0 || $book_price < 0) {
    echo "<script>alert('Number of copies and book price must be non-negative.');</script>";
    exit;
}


$check_author_query = "SELECT * FROM authors WHERE author_id = $author_id";
$check_author_result = mysqli_query($conn, $check_author_query);

if (mysqli_num_rows($check_author_result) == 0) {
    
    $author_query = "INSERT INTO authors (author_id, author_name) 
                     VALUES ($author_id, '$author_name')";
    if (!mysqli_query($conn, $author_query)) {
        echo "<script>alert('Error: Could not add the author.');</script>";
        exit;
    }
}

$check_category_query = "SELECT * FROM categories WHERE category_id = $cat_id AND category_name = '$category_name'";
$check_category_result = mysqli_query($conn, $check_category_query);

if (mysqli_num_rows($check_category_result) == 0) {
    
    $category_query = "INSERT INTO categories (category_id, category_name) 
                       VALUES ($cat_id, '$category_name')";
    if (!mysqli_query($conn, $category_query)) {
        echo "<script>alert('Error: Could not add the category.');</script>";
        exit;
    }
}


$book_query = "INSERT INTO books (book_name, book_isbn, author_id, category_id, number_of_copies, book_price) 
               VALUES ('$book_name', '$book_isbn', $author_id, $cat_id, $no_of_copies, $book_price)";
               
if (mysqli_query($conn, $book_query)) {
    echo "<script>alert('Book added successfully!');</script>";
} else {
    echo "<script>alert('Error: Could not add the book.');</script>";
}


mysqli_close($conn);
?>
