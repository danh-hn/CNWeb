<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../PHPMailer-master/src/PHPMailer.php";
require "../PHPMailer-master/src/SMTP.php";
require '../PHPMailer-master/src/Exception.php';

//Kết nối MySQL
$conn = new mysqli('localhost', 'root', '', 'maildb');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

//Lấy danh sách email
$sql = "SELECT email FROM users";
$result = $conn->query($sql);

$mail = new PHPMailer(true);

try {
    //Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'danhhn.24ite@vku.udn.vn';      // email của bạn
    $mail->Password = 'ggbb iuhm igsw zgpb';        // mật khẩu ứng dụng Gmail
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('youremail@gmail.com', 'Admin');
    $mail->isHTML(true);
    $mail->Subject = 'Thông báo chung';
    $mail->Body    = 'Xin chào, đây là email gửi đến tất cả người dùng!';

    //Thêm người nhận từ CSDL
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mail->addAddress($row['email']);
        }
    }

    // 5️⃣ Gửi email
    $mail->send();
    echo "Gửi email thành công đến tất cả người nhận!";
} catch (Exception $e) {
    echo "Lỗi: {$mail->ErrorInfo}";
}
?>
