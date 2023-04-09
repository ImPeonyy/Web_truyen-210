<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_truyen-210";
    $conn = mysqli_connect("$servername", "$username", "$password", "$dbname")
        or die("Không thể kết nối tới database");
    mysqli_select_db($conn, "$dbname") or die("Không thể chọn database");
    mysqli_query($conn, "SET NAMES 'utf8'");
?>