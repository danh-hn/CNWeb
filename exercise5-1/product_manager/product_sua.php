<?php
include '../view/header.php';
include_once('../model/database.php'); // biến $db là PDO

// Kiểm tra có productID không
if (isset($_GET['productID'])) {
    $productID = (int) $_GET['productID'];

    $sql = "SELECT * FROM products WHERE productID = :productID"; 
    $stmt = $db->prepare($sql);
    $stmt->execute([':productID' => $productID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        die("Không tìm thấy sản phẩm có id = $productID");
    }
} else {
    die("Thiếu tham số productID");
}
?>
<main>
    <h1>Adjust Product</h1>
    <form action="product_update.php" method="post">
        <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>"><br>

        <label>Code:</label>
        <input type="text" name="code" value="<?php echo $row['productCode']; ?>"><br>
        <br>

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['productName']; ?>"><br>
        <br>

        <label>List Price:</label>
        <input type="text" name="price" value="<?php echo $row['listPrice']; ?>"><br>
        <br>

        <input type="submit" value="Adjust Product">
    </form>
    <p><a href="index.php?action=list_products">Back to Product List</a></p>
</main>
<?php include '../view/footer.php'; ?>
