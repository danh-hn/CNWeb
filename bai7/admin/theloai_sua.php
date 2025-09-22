<?php
include_once('../connect.php');

// Lấy idTL từ URL
if (isset($_GET['idTL'])) {
    $idTL = $_GET['idTL'];

    // Lấy thông tin thể loại theo idTL
    $sql = "SELECT * FROM theloai WHERE idTL = $idTL";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("Không tìm thấy thể loại có id = $idTL");
    }
} else {
    die("Thiếu tham số idTL");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sửa thể loại</title>
</head>
<body>
    <h2 align="center">Sửa Thể Loại</h2>
    <form action="theloai_update.php" method="post" align="center">
        <input type="hidden" name="idTL" value="<?php echo $row['idTL']; ?>">

        <label>Tên thể loại:</label>
        <input type="text" name="TenTL" value="<?php echo $row['TenTL']; ?>"><br><br>

        <label>Thứ tự:</label>
        <input type="number" name="ThuTu" value="<?php echo $row['ThuTu']; ?>"><br><br>

        <label>Ẩn / Hiện:</label>
        <select name="AnHien">
            <option value="1" <?php if ($row['AnHien'] == 1) echo "selected"; ?>>Hiện</option>
            <option value="0" <?php if ($row['AnHien'] == 0) echo "selected"; ?>>Ẩn</option>
        </select><br><br>
        <p>
            <label>Biểu tượng hiện tại:</label><br>
            <img src="../image/<?php echo $row['icon']; ?>" width="40" height="40"><br>
            <input type="file" name="icon">
            <input type="hidden" name="old_icon" value="<?php echo $row['icon']; ?>">
        </p>

        

        <input type="submit" value="Cập nhật">
        <a href="theloai.php">Quay lại</a>
    </form>
</body>
</html>
