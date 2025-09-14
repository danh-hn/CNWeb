<!DOCTYPE html>
<html>

<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <?php
            $product_description = $_POST['product_description'];
            $list_price = $_POST['list_price'];
            $discount_percent = $_POST['discount_percent'];


            $discount_amount = $list_price * $discount_percent / 100 ;
            $discount_price = $list_price - $discount_amount
        ?>

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($list_price); ?> VND</span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discount_percent); ?> %</span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_amount; ?></span> VND<br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price; ?></span> VND<br>
    </main>
</body>

</html>