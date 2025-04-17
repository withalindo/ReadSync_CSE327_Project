<?php
    session_start();
    include('connectDB.php');

    if (isset($_POST['login'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validate form data
        if (empty($email)) {
            echo "<script>alert('Email is required'); window.location.href='../FrontEnd/userloginF.php';</script>";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format'); window.location.href='../FrontEnd/userloginF.php';</script>";
        } else if (empty($password)) {
            echo "<script>alert('Password is required'); window.location.href='../FrontEnd/userloginF.php';</script>";
        } else {
            // Prepare and execute query using a prepared statement
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($password == $row['password']) {
                    $_SESSION['name'] = $row['user_name'];
                    $_SESSION['email'] = $row['user_email'];
                    $_SESSION['id'] = $row['user_id'];
                    header("Location: ../FrontEnd/userDashBoard.php");
                    exit();
                } else {
                    echo "<script>alert('Wrong Password! An email has been sent to you regarding this attempt.'); window.location.href='../FrontEnd/userloginF.php';</script>";
                }
            } else {
                echo "<script>alert('Email not found. Please check your email and try again.'); window.location.href='../FrontEnd/userloginF.php';</script>";
            }

            $stmt->close();
            mysqli_close($conn);
        }
    }
?>