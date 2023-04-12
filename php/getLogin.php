<?php
    require 'connect.php';
    if (isset($_GET['submit'])) {
        echo "Đã nhận được dữ liệu";
        echo "<pre>";
        print_r($_GET);
        $name = $_GET['username-login'];
        $password = $_GET['password-login'];

        $sql = "SELECT 'username', 'password' FROM account WHERE username = '$name' AND password = '$password'";



        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../page/auth.html");
        } else {
            echo "Tài khoản hoặc mật khẩu sai !";
        }
    }
?>