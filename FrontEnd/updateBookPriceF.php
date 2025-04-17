<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book Price</title>
    <link rel="stylesheet" href="css/updateBookCopy.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>

<body>

    <!-- Backgrouund -->
    <div class="background">
        <div class="overlay"></div>
    </div>

    <!-- Menu Bar -->
    <div class="menuBar">
        <div class="menuImage" onclick="openNav()"></div>
    </div>

    <!-- Side Nav-->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <a href="../FrontEnd/updateBookPriceF.php" class="active">
            <button class="updatePrice">
                Update Book Price
            </button>
        </a>

        <a href="../FrontEnd/updateBookCopyF.php">
            <button class="updateBookCopies">
                Update Book Copy
            </button>
        </a>

        <a href="../FrontEnd/updatePanelF.php">
            <button class="update">
                Update Books
            </button>
        </a>

        <a href="../FrontEnd/updateBookNameF.php">
            <button class="updateName">
                Update Book Name
            </button>
        </a>

        <a href="../FrontEnd/addBooksF.php">
            <button class="add">
                Add Book
            </button>
        </a>

        <a href="../FrontEnd/adminStockF.php">
            <button class="stockButton">
                Book Stock
            </button>
        </a>

        <a href="../FrontEnd/landingF.php">
            <button class="logout">
                Log Out
            </button>
        </a>

    </div>


    <form action="../BackEnd/updateBookPrice.php" method="POST" class="form-container">
        <h2 class="form-title">Update Book Price</h2>
        <input type="text" id="bookName" name="book_name" placeholder="Book Name" required>
        <input type="number" id="ISBN" name="book_isbn" placeholder="Enter ISBN Number" required>
        <input type="number" id="new_book_price" name="new_book_price" placeholder="Update the price of the book" required>
        <button type="submit" id="updateButton">Update The Book Price</button>
    </form>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
            document.getElementById("overlay").style.display = "block";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("overlay").style.display = "none";
        }
    </script>

</body>

</html>