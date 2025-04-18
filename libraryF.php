<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Stock</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/library.css">
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
        <a href="../FrontEnd/libraryF.php" class="active"><button class="stockButton">Library Stock</button></a>
        <a href="../FrontEnd/userDashBoard.php"><button class="dashboard">User Dashboard</button></a>
        <a href="../FrontEnd/landingF.php"><button class="logoutButton">Log Out</button></a>

    </div>
<!-- Stock Table -->
<div class="stockSpace">
    <table border="1" style="width: 100%; text-align: center; background-color: white;">
        <thead>
            <tr>
                <th>Book ISBN</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Category Name</th>
                <th>Book Price</th>
            </tr>
        </thead>
        <tbody>
            <?php include "../BackEnd/library.php"; ?>  
        </tbody>
    </table>
</div>

<!-- Request a Book Button -->
<div class="requestBook">
    <a href="../FrontEnd/request_bookF.php" class="requestButton">Didn't found the book, then request for it</a>
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






