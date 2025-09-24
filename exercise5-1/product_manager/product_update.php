<?php
include_once('../model/database.php'); // lấy $db (PDO)

// Lấy dữ liệu từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = (int) $_POST['productID'];
    $code = trim($_POST['code']);
    $name = trim($_POST['name']);
    $price = (float) $_POST['price'];

    // Kiểm tra dữ liệu
    if (empty($code) || empty($name) || $price <= 0) {
        echo "<script>
                alert('Vui lòng nhập đầy đủ và chính xác thông tin sản phẩm!');
                window.history.back();
              </script>";
        exit();
    }

    // Cập nhật vào CSDL
    $sql = "UPDATE products 
            SET productCode = :code, 
                productName = :name, 
                listPrice   = :price
            WHERE productID = :productID";

    $stmt = $db->prepare($sql);
    $success = $stmt->execute([
        ':code' => $code,
        ':name' => $name,
        ':price' => $price,
        ':productID' => $productID
    ]);

    if ($success) {
        // Quay lại danh sách sản phẩm
        echo "<script>
                alert('Cập nhật sản phẩm thành công!');
                window.location.href = 'index.php?action=list_products';
              </script>";
        exit();

    } else {
        die("Lỗi khi cập nhật sản phẩm!");
    }
} else {
    die("Truy cập không hợp lệ!");
}
?>