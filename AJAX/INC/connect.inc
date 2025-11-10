<?php
$server = "localhost"; 
$user   = "root";
$pass   = "";
$db     = "udn";

$con = mysqli_connect($server, $user, $pass, $db);

// Kiểm tra lỗi kết nối
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Thiết lập charset UTF-8
mysqli_set_charset($con, "utf8");
?>
