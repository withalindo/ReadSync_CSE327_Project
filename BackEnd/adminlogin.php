<?php
    session_start();
    include('connectDB.php');

    if (isset($_POST['login'])) {
       
        $admin_id = (int) trim($_POST['admin_id']);
        $password = trim($_POST['password']);

        if (empty($admin_id) || empty($password)) {
            echo "<script>alert('Fields cannot be empty.'); window.location.href='../FrontEnd/adminLoginF.php';</script>";
            exit();
        }

       
        $stmt = $conn->prepare("SELECT * FROM admins WHERE admin_id = ? LIMIT 1");
        $stmt->bind_param("i", $admin_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
           
            if ($password === $row['admin_password']) {
                $_SESSION['name']     = $row['admin_name'];
                $_SESSION['email']    = $row['admin_email'];
                $_SESSION['admin_id'] = $row['admin_id'];
                header("Location: ../FrontEnd/adminDashboardF.php");
                exit();
            } else {
                echo "<script>alert('Wrong Password.'); window.location.href='../FrontEnd/adminLoginF.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid Admin ID.'); window.location.href='../FrontEnd/adminLoginF.php';</script>";
            exit();
        }

        $stmt->close();
        $conn->close();
    }
?>