<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="normalize" href="css/normalize.css">
    <link rel="stylesheet" href="css/user_DashBoard.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>
<body>

    <div class="background">
        <div id="overlay" class="overlay"></div>
    </div>

    <div class="menuBar" onclick="openNav()">
        <div class="menuImage"></div>
    </div>

    <div id="mySidenav" class="sidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="sideMenu"></div>
        <a href="../FrontEnd/userDashBoard.php" class="active"> 
            <button class="profileButton">
                User Dashboard

            </button>
        </a>

        <a href="../FrontEnd/libraryF.php">
            <button class="libraryButton">
                Library Stock
            </button>
        </a>

        <a href="../FrontEnd/landingF.php">
            <button class="logoutButton">
                Log Out
            </button>
        </a>    
    </div>

    <div class="main-content">
        <a href="../FrontEnd/borrowBookF.php">
            <button class="borrow morebutton">
                Borrow a Book
            </button>
        </a>

        <a href="../FrontEnd/borrowedBooksF.php"> 
            <button class="view morebutton">
                Borrowed Books
            </button>
        </a>

        <a href="../FrontEnd/request_bookF.php">
            <button class="request morebutton">
                Request a Book
            </button>
        </a>
    </div>

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