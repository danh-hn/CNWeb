<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
</head>
<body>
    <?php
    $ketqua = "";
    if (isset($_POST["a"]) && isset($_POST["b"])) {
        $a = floatval($_POST["a"]); 
        $b = floatval($_POST["b"]); 

        if ($a == 0) {
            if ($b == 0) {
                $ketqua = "Phương trình có vô số nghiệm.";
            } else {
                $ketqua = "Phương trình vô nghiệm.";
            }
        } else {
            $x = -$b / $a;
            $ketqua = "x = ". $x;
        }
    }
    ?>

    <form method="post" action="">
        <table border="1" >
            <tr>
                <td colspan="3" bgcolor="#336699" style="color:white; text-align:center;">
                    <strong>Giải phương trình bậc 1</strong>
                </td>
            </tr>
            <tr>
                <td style=" width: 120px;">Phương trình</td>
                <td style="width: 220px">
                    <input type="text" name="a" value="<?php echo isset($_POST["a"]) ? $_POST["a"] : ""; ?>" /> X +
                </td>
                <td style="width: 220px">
                    <input type="text" name="b" value="<?php echo isset($_POST["b"]) ? $_POST["b"] : ""; ?>" /> = 0
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Nghiệm:
                    <input type="text" name="kq" value="<?php echo $ketqua; ?>" readonly />
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <input type="submit" value="Xuất" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
