<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/landing.css">
    <link href="https://fonts.cdnfonts.com/css/roseritta" rel="stylesheet">
</head>

<body>
    <div class="background">
        <video autoplay loop muted playsinline class="background-video">
            <source src="../FrontEnd/Background_Images/landing.mp4" type="video/mp4">
            Browser does not support the video tag.
        </video>

        <div class="content">
            <a href="../FrontEnd/userloginF.php">
                <button class="user">
                    Log In as <br>USER
                </button>
            </a>

            <a href="../FrontEnd/adminLoginF.php">
                <button class="admin">
                    Log In as ADMIN
                </button>
            </a>

            <a class="link" href="signupF.php">NOT REGISTERED YET? SIGN UP!</a>
        </div>
    </div>
</body>

</html>