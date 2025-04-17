<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updation Panel</title>
    <link rel="stylesheet" href="css/addBooks.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>

<body>
    <div class="background">
        <div class="overlay"></div>
    </div>

    <div class="menuBar">
        <div class="menuImage" onclick="openNav()"></div>
    </div>

    <div class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <a href="../FrontEnd/addBooksF.php" class="active">
            <button class="add">
                Add Books
            </button>
        </a>

        <a href="../FrontEnd/updatePanelF.php">
            <button class="update">
                Update Books
            </button>
        </a>

        <a href="../FrontEnd/adminStockF.php">
            <button class="stockButton">
                Book Stock
            </button>
        </a>

        <a href="../FrontEnd/updateBookCopyF.php">
            <button class="updateBookCopies">
                Update Book Copy
            </button>
        </a>

        <a href="../FrontEnd/update_book_priceF.php">
            <button class="updatePrice">
                Update Book Price
            </button>
        </a>

        <a href="../FrontEnd/landingF.php">
            <button class="logout">
                Log Out
            </button>
        </a>

    </div>

    <form action="../BackEnd/addbooks.php" method="POST" class="form-container">
        <h2 class="form-title">Add a New Book</h2>
        <input type="text" id="bookName" name="book_name" placeholder="Book Name" required>
        <input type="number" id="ISBN" name="book_isbn" placeholder="Enter ISBN Number" required>
        <input type="text" id="authorName" name="author_name" placeholder="Enter Author Name" required>
        <input type="number" id="authorID" name="author_id" placeholder="Enter New Author ID" required>
        <input type="text" id="catName" name="cat_name" placeholder="Enter Category Name" required>
        <input type="number" id="catID" name="cat_id" placeholder="Enter Category ID" required>
        <input type="number" id="copies" name="no_of_copies" placeholder="Enter Number of Copies" required>
        <input type="number" id="cost" name="book_price" placeholder="Enter Book Price" required>
        <button type="submit" id="addButton">Add Book</button>
    </form>

    <script>
        function openNav() {
            document.querySelector(".sidenav").style.width = "300px";
            document.querySelector(".overlay").style.display = "block";
        }

        function closeNav() {
            document.querySelector(".sidenav").style.width = "0";
            document.querySelector(".overlay").style.display = "none";
        }
    </script>

</body>

</html>