<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        include("connectDB.php");

        // Retrieve and sanitize form data
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $dob = $_POST['DOB']; // Assuming date input is already sanitized
        $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

       
        if (empty($username)) {
            echo "<script>alert('Username is required'); window.location.href='../FrontEnd/landingF.php';</script>";
        } else if (empty($name)) {
            echo "<script>alert('Name is required'); window.location.href='../FrontEnd/landingF.php';</script>";
        } else if (empty($email)) {
            echo "<script>alert('Email is required'); window.location.href='../FrontEnd/landingF.php';</script>";
        } else if (empty($password)) {
            echo "<script>alert('Password is required'); window.location.href='../FrontEnd/landingF.php';</script>";
        } else {
            
            $statement = $conn->prepare("INSERT INTO users (user_name, user_email, DOB, user_mobile, password) VALUES (?, ?, ?, ?, ?)");
            $statement->bind_param("sssss", $username, $email, $dob, $mobile, $password);

            if ($statement->execute()) {
                echo "<script>alert('Congratulations! Your registration is successful! You can now log in.'); window.location.href='../FrontEnd/userloginF.php';</script>";
            } else {
                echo "<script>alert('Something went wrong. <br>Error: " . $statement->error . "'); window.location.href='../FrontEnd/landingF.php';</script>";
            }

            
            $statement->close();
            mysqli_close($conn);
        }
    }
?>