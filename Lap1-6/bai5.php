<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bài 5</title>
</head>

<body>
    <?php
    function giaiPTB2($a, $b, $c)
    {
        if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
            return "Vui lòng nhập số hợp lệ!";
        }

        if ($a == 0) { // Trường hợp bậc 1 hoặc vô nghiệm
            if ($b == 0) {
                if ($c == 0) {
                    return "Phương trình có vô số nghiệm";
                } else {
                    return "Phương trình vô nghiệm";
                }
            } else {
                $x = -$c / $b;
                return "Phương trình có nghiệm duy nhất x = $x";
            }
        } else {
            // Bậc 2
            $delta = $b * $b - 4 * $a * $c;
            if ($delta < 0) {
                return "Phương trình vô nghiệm";
            } elseif ($delta == 0) {
                $x = -$b / (2 * $a);
                return "Phương trình có nghiệm kép x = $x";
            } else {
                $x1 = (-$b + sqrt($delta)) / (2 * $a);
                $x2 = (-$b - sqrt($delta)) / (2 * $a);
                return "Phương trình có 2 nghiệm phân biệt: x1 = $x1, x2 = $x2";
            }
        }
    }
    
    $kq = "";
    if (isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["c"])) {
        $kq = giaiPTB2($_POST["a"], $_POST["b"], $_POST["c"]);
    }
    ?>
    <form action="" method="post">
        <table width="806" border="1">
            <tr>
                <td colspan="4" bgcolor="#336699"><strong>Giải phương trình bậc 2</strong></td>
            </tr>
            <tr>
                <td width="90">Phương trình </td>
                <td width="236">
                    <input name="a" type="text" />
                    X^2 +
                </td>
                <td width="218"><label for="textfield3"></label>
                    <input type="text" name="b" id="textfield3" />
                    X+
                </td>
                <td width="241"><label for="textfield"></label>
                    <input type="text" name="c" id="textfield" />
                    =0
                </td>
            </tr>
            <tr align="center">
                <td  colspan="4">
                    Nghiệm
                    <label for="textfield2"></label>
                    <input name="textfield" type="text" style="width:500px;" id="textfield2" value="<?php echo $kq ?>" />
            </tr>
            <tr>
                <td colspan="4" align="center" valign="middle"><input type="submit" name="chao" id="chao"
                        value="Xuất" /></td>
            </tr>
        </table>
    </form>
</body>

</html>