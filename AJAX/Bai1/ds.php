<?php
include("../inc/connect.inc");
$lop = isset($_GET['lop']) ? trim($_GET['lop']) : '';


$sql="Select * from sinhvien where lop='{$lop}'";
$rs=mysqli_query($con,$sql);
$str="<table>
  <tr class=hd>
    <td>TT</td>
    <td>Mã số</td>
    <td>Họ tên</td>
    <td>Địa chỉ</td>
  </tr>";
$tt=1;
while($row=mysqli_fetch_array($rs)){
  $str.="<tr>
    <td>{$tt}</td>
    <td>{$row['masv']}</td>
    <td>{$row['hoten']}</td>
    <td>{$row['diachi']}</td>
  </tr>";
  $tt++;
}
$str.="</table>";

echo $str;
?>

<!-- <?php
include("../inc/connect.inc");

// Lấy giá trị lớp từ URL và làm sạch dữ liệu
$lop = isset($_GET['lop']) ? trim($_GET['lop']) : '';

// Chuẩn bị truy vấn an toàn bằng prepared statement
$sql = "SELECT masv, hoten, diachi FROM sinhvien WHERE lop = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $lop);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Tạo bảng HTML
$str = "<table border='1' cellspacing='0' cellpadding='6' style='border-collapse: collapse; width: 100%;'>
  <tr style='background-color:#f0f0f0; font-weight:bold;'>
    <td>TT</td>
    <td>Mã số</td>
    <td>Họ tên</td>
    <td>Địa chỉ</td>
  </tr>";

$tt = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $str .= "<tr>
      <td>{$tt}</td>
      <td>" . htmlspecialchars($row['masv']) . "</td>
      <td>" . htmlspecialchars($row['hoten']) . "</td>
      <td>" . htmlspecialchars($row['diachi']) . "</td>
    </tr>";
    $tt++;
}

$str .= "</table>";

echo $str;
?> -->
