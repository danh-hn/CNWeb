<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bai 4</title>
</head>

<body>
    <?php
        $so_dau = "";
        $so_cuoi = "";
        $tong_all = 0;
        $tong_chan = 0;
        $tong_le = 0;
        $tich = 1;
    if (isset($_POST["so_dau"]) && isset($_POST["so_cuoi"])) {
        $fisrt = $_POST["so_dau"];
        $last = $_POST["so_cuoi"];


        for ($i = $fisrt; $i <= $last; $i++)
            $tong_all = $tong_all + $i;

        for ($i = $fisrt; $i <= $last; $i++)
            $tich = $tich*$i;

        for ($i = $fisrt; $i <= $last; $i++)
            if ($i % 2 == 0)
                $tong_chan = $tong_chan + $i;
        
        for ($i = $fisrt; $i <= $last; $i++)
            if ($i %2 != 0)
                $tong_le = $tong_le + $i;
    }
    ?>

    <form action="" method="post">
        <table width="728" border="1">
            <tr>
                <td width="122">&nbsp;</td>
                <td width="76">Số bắt đầu</td>
                <td width="169"><label for="textfield"></label>
                    <input type="text" name="so_dau" id="textfield" value="" />
                </td>
                <td width="152">Số kết thúc</td>
                <td width="175"><label for="textfield2"></label>
                    <input type="text" name="so_cuoi" id="textfield2" value="" />
                </td>
            </tr>
            <tr>
                <td colspan="5">Kết quả
                    <label for="textfield3"></label>
                </td>
            </tr>
            <tr>
                <td>Tổng các số</td>
                <td colspan="4"><label for="textfield4"></label>
                    <input type="text" name="tong" id="textfield4" value="<?php echo $tong_all?> " />
                </td>
            </tr>
            <tr>
                <td>Tích các số</td>
                <td colspan="4"><label for="textfield5"></label>
                    <input type="text" name="tich" id="textfield5" value="<?php echo $tich ?>" />
                </td>
            </tr>
            <tr>
                <td>Tổng các số chẵn</td>
                <td colspan="4"><label for="textfield6"></label>
                    <input type="text" name="tong_chan" id="textfield6" value="<?php echo $tong_chan ?> " />
                </td>
            </tr>
            <tr>
                <td>Tổng các số lẻ</td>
                <td colspan="4"><label for="textfield7"></label>
                    <input type="text" name="tong_le" id="textfield7" value="<?php echo $tong_le ?>" />
                </td>
            </tr>
            <tr>
                <td colspan="5"><input type="submit" name="button" id="button" value="Tính toán" /></td>
            </tr>
        </table>
    </form>
</body>

</html>