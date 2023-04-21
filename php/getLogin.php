<?php
    require 'connect.php';
    session_start();
    if (isset($_GET['submit'])) {
        echo "Đã nhận được dữ liệu";
        echo "<pre>";
        print_r($_GET);
        $username = $_GET['username-login'];
        $password = $_GET['password-login'];
        $sql = "SELECT * FROM account WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($username == $row['username'] && $password == $row['password'])
        {
            $_SESSION['username-login'] = $username;
            header("Location: ../main_authed.php");
        } else {
            echo "<script> alert('Tài khoản hoặc mật khẩu sai !') </script>";
        }
    }
?>
