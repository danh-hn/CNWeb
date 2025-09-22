<?php
include_once('../connect.php');

// Lấy dữ liệu từ form
$idTL   = $_POST['idTL'];
$theloai = $_POST['TenTL'];
$thutu   = $_POST['ThuTu'];
$an      = $_POST['AnHien'];

// Xử lý hình ảnh
$icon = $_FILES['icon']['name'];  // file upload mới
$icon_tmp = $_FILES['icon']['tmp_name'];
$old_icon = $_POST['old_icon'];   // icon cũ (hidden trong form)

// Nếu có chọn ảnh mới → upload và thay thế
if (!empty($icon)) {
    move_uploaded_file($icon_tmp, "../image/" . $icon);

    // Xóa ảnh cũ nếu tồn tại
    if (!empty($old_icon) && file_exists("../image/" . $old_icon)) {
        unlink("../image/" . $old_icon);
    }
} else {
    // Không upload ảnh mới → giữ ảnh cũ
    $icon = $old_icon;
}

// Câu lệnh update
$sql = "UPDATE theloai 
        SET TenTL = '$theloai', ThuTu = '$thutu', AnHien = '$an', icon = '$icon'
        WHERE idTL = '$idTL'";

if (mysqli_query($connect, $sql)) {
    echo "<script language='javascript'>alert('Cập nhật thành công');";
    echo "location.href='theloai.php';</script>";
} else {
    echo "Lỗi: " . mysqli_error($connect);
}

mysqli_close($connect);
?>
