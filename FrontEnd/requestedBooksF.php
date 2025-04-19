/**
 * @file requestedBooksF.php
 * @brief This is the page I use to display all requested books in a table format.
 *
 * In this file, I create a user-friendly interface to display all book requests. 
 * The page includes a navigation menu for easy access to other sections, such as 
 * book stock, update panel, and adding books. I also include a logout button for 
 * user convenience. The requested books data is dynamically fetched from the backend 
 * script `requestedBooks.php` and displayed in a table. The page is styled using 
 * external CSS files, and I use JavaScript to handle the side navigation menu.
 *
 * @author Anisha Ashfiya
 * @date April 19, 2025
 */

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Books</title>

    <!-- I include stylesheets for normalizing styles and custom design -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/requestedBooks.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>
<body>
    <!-- Background -->
    <div class="background">
        <div id="overlay" class="overlay"></div>
    </div>

    <!-- Menu Bar -->
    <div class="menuBar" onclick="openNav()">
        <div class="menuImage"></div>
    </div>

    <!-- Side Navigation -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <!-- I highlight the active page and provide navigation buttons -->
        <a href="../FrontEnd/requestedBooksF.php" class="active">
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
            <button class="update morebutton">
                Update Books
            </button>
        </a>

        <a href="../FrontEnd/addBooksF.php">
            <button class="add morebutton">
                Add Books
            </button>
        </a>

        <a href="../FrontEnd/landingF.php">
            <button class="logoutButton">
                Log Out
            </button>
        </a>    
    </div>

    <!-- Requested Books Table -->
    <div class="stockSpace">
        <table>
            <thead class="table-header">
                <tr>
                    <th>Request ID</th>
                    <th>Book Name</th>
                    <th>Book ISBN</th>
                    <th>Author Name</th>
                    <th>User Name</th>
                    <th>Status</th>
                    <th>Request Timestamp</th>
                </tr>
            </thead>

            <tbody class="table-body">
                <!-- I include the backend script to dynamically fetch and display data -->
                <?php include '../BackEnd/requestedBooks.php'; ?>
            </tbody>
        </table>
    </div>

    <!-- JavaScript for handling the side navigation menu -->
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

