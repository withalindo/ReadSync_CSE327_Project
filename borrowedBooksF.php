<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Books</title>
    <link rel="stylesheet" href="../FrontEnd/css/borrowedBooks.css"> 
</head>
<body>
    <div class="container">
        <h1>Borrowed Books</h1>
        <form action="" method="POST" style="text-align: center; margin-bottom: 20px;">
            <input type="text" name="user_name" placeholder="Enter User Name" required>
            <button type="submit">View Borrowed Books</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Issue Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    include "../BackEnd/borrowedBooks.php";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>