<?php
include_once('../connect.php');

// Lấy dữ liệu từ form
$theloai = $_POST['TenTL'];
$thutu   = $_POST['ThuTu'];
$an      = $_POST['AnHien'];

// Xử lý hình ảnh
$icon = "";
if (!empty($_FILES['image']['name'])) {
    $icon = $_FILES['image']['name'];
    $icon_tmp = $_FILES['image']['tmp_name'];

    // Đường dẫn lưu ảnh
    $upload_path = "../image/" . $icon;

    // Nếu file đã tồn tại thì thêm thời gian để tránh trùng
    if (file_exists($upload_path)) {
        $icon = time() . "_" . $icon;
        $upload_path = "../image/" . $icon;
    }

    // Di chuyển file upload vào thư mục image
    move_uploaded_file($icon_tmp, $upload_path);
} else {
    $icon = "default.png"; // nếu muốn đặt ảnh mặc định
}

// Thực hiện thêm dữ liệu
$sql = "INSERT INTO theloai (TenTL, ThuTu, AnHien, icon) 
        VALUES ('$theloai', '$thutu', '$an', '$icon')";

if (mysqli_query($connect, $sql)) {
    echo "<script language='javascript'>alert('Thêm thành công');";
    echo "location.href='theloai.php';</script>";
} else {
    echo "Lỗi: " . mysqli_error($connect);
}

mysqli_close($connect);
?>
