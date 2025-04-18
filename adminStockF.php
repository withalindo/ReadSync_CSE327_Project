<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/adminStock.css">
</head>

<body>
    <!-- Background -->
    <div class="background">
        <div id="overlay" class="overlay" onclick="closeNav()"></div>
    </div>

    <!-- Menu Bar -->
    <div class="menuBar" onclick="openNav()">
        <div class="menuImage"></div>
    </div>

    <!-- Side Navigation -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../FrontEnd/adminStockF.php" class="active">
            <button class="stockButton">
                Books Stock
            </button>
        </a>

        <a href="../FrontEnd/updatePanelF.php">
            <button class="update morebutton">
                Update Books
            </button>
        </a>

        <a href="../FrontEnd/requestedBooksF.php">
            <button class="requestsButton">
                Requested Books
            </button>
        </a>

        <a href="../FrontEnd/landingF.php">
            <button class="logoutButton">
                Log Out
            </button>
        </a>

    </div>

    <!-- Stock Table -->
    <div class="stockSpace">
        <table border="1" style="width: 100%; text-align: center; background-color: white;">
            <thead>
                <tr>
                    <th>Book ISBN</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Author ID</th>
                    <th>Category Name</th>
                    <th>Category ID</th>
                    <th>No. of Copies</th>
                    <th>Book Price</th>
                </tr>
            </thead>
            <tbody>
                <?php include "../BackEnd/adminStock.php"; ?> <!-- Fetch and display data -->
            </tbody>
        </table>
    </div>



    <!-- JavaScript -->
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