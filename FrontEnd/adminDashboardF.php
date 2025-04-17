/** 
 * File: adminDashboardF.php
 * Description: This file is the front-end for the admin dashboard.
 * It contains the HTML structure and links to the CSS and JavaScript files.
    * The dashboard has a side navigation menu with options for requests and stock.
    * The menu can be opened and closed with JavaScript functions.
    * The page is styled using CSS and uses a custom font.
    * The page also contains a background overlay that appears when the menu is open.
    * The page is responsive and adjusts to different screen sizes.
    */
    <?php
    include("../BackEnd/admindashboard.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/adminDashboard.css">
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
        <div class="sideMenu">
        
        <a href="../FrontEnd/adminDashboardF.php"class="active">
            <button class="dashboardButton">
                Admin Dashboard
            </button>
        </a>

        <a href="../FrontEnd/requestedBooksF.php">
            <button class="requestsButton">
                Requested Books
            </button>
        </a>

        <a href="../FrontEnd/adminStockF.php">
            <button class="stockButton">
                Book Stock
            </button>

        </a>

        <a href="../FrontEnd/updatePanelF.php">
            <button class="stockButton">
                Update Panel
            </button>

        </a>

        <a href="../FrontEnd/landingF.php">
            <button class="logoutButton">
                Log Out
            </button>
        </a>

        </div>

    </div>



    <div class="main-content">
        <a href="../FrontEnd/adminStockF.php">
            <button class="stock morebutton">
                Book<br>Stock
            </button>
        </a>

        <a href="../FrontEnd/requestedBooksF.php">
            <button class="requests morebutton">
                Requested Books
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