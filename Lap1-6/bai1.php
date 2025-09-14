<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
</head>

<body>
    <?php
    $xuat_ten = "";
    if (isset($_POST["ten"])) {
        $ten = trim($_POST["ten"]);
        if ($ten !== "") {
            $xuat_ten = "Chào bạn " . htmlspecialchars($ten);
        } else {
            $xuat_ten = "Vui lòng nhập tên!";
        }
    }
    ?>
    
    <form method="post" action="">
        <table border="1" width="300">
            <tr>
                <td colspan="2" bgcolor="#336699" style="color:white; text-align:center;">
                    <strong>In lời chào</strong>
                </td>
            </tr>
            <tr>
                <td width="100">Họ tên bạn</td>
                <td>
                    <input type="text" name="ten" id="chao3" />
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <label><?php echo $xuat_ten; ?></label>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" valign="middle">
                    <input type="submit" value="Xuất" />
                </td>
            </tr>
        </table>
    </form>

    

</body>

</html>