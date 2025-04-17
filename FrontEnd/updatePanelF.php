<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updation Panel</title>
    <link rel="stylesheet" href="css/updatePanel.css">
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

    <a href="../FrontEnd/updatePanelF.php" class="active">
    <button class="update">
        Update Books
    </button> 
    </a>

    <a href="../FrontEnd/adminStockF.php">
    <button class="stockButton">
        Book Stock 
    </button> 
    </a>

    <a href="../FrontEnd/addBooksF.php">
    <button class="add">
        Add Books
    </button> 
    </a>

    <a href="../FrontEnd/updateBookCopyF.php">
    <button class="updateBookCopies">
        Update Book Copy
    </button> 
    </a>

    <a href="../FrontEnd/updateBookNameF.php">
    <button class="updateName">
        Update Book Name
    </button>
    </a>

    <a href="../FrontEnd/updateBookPriceF.php">
    <button class="updatePrice">
        Update Book Price
    </button> 
    </a>
    
    <a href="../FrontEnd/deleteBookF.php">
    <button class="deleteBook">
        Delete Book
    </button>
    </a>

    <a href="../FrontEnd/landingF.php">
    <button class="logout">
        Log Out
    </button> 
    </a>

    </div>

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