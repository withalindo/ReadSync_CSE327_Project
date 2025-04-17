<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>

<body>
    <div class="background">
        <a id="backLink" href="landingF.php">
            <p id="backButton">BACK</p>
        </a>
        <form action="../BackEnd/signup.php" method="post">
            <input type="text" id="name" name="name" placeholder="Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="date" id="DOB" name="DOB" placeholder="Date of Birth" required>
            <input type="text" id="mobile" name="mobile" placeholder="Phone" required>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="submit" id="signUpButton" name="signup" value="SIGN UP">
        </form>
    </div>
</body>

</html>