<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
    <link rel="stylesheet" href="../FrontEnd/css/returnBook.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <h1>Return Book</h1>
        <form action="../BackEnd/returnBook.php" method="POST">
            <input type="text" name="user_name" placeholder="Enter User Name" required>
            <input type="text" name="book_name" placeholder="Enter Book Name" required>
            <button type="submit">Return The Book</button>
        </form>
    </div>
</body>
</html>