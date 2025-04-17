
<?php
include("../BackEnd/userlogin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/userlogin.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>

<body>
    <div class="background">
        <form action="../BackEnd/userlogin.php" method="post">
            <a href="landingF.php">
                <p id="backButton">BACK</p>
            </a>
            <h1>USER LOGIN</h1>

            <input type="text" id="username" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="submit" id="loginButton" name="login" value="LOGIN">
        </form>
    </div>
</body>

</html>