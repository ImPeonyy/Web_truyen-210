<?php
    require'connect.php';
    if (isset($_GET['submit'])) {
        echo "Đã nhận được dữ liệu";
        echo "<pre>";
        print_r($_GET);
        $name = $_GET['username-regis'];
        $password = $_GET['password-regis'];
        $email = $_GET['email'];


        $sql = "INSERT INTO account ( username, password, email) 
        VALUES ('$name', '$password', '$email')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Thêm dữ liệu thành công";
        } else {
            echo "Thêm dữ liệu thất bại";
        }
    }
?>