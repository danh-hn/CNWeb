<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <h2 align="center">Thêm Thể Loại</h2>
    <form action="theloai_them_xl.php" method="post" enctype="multipart/form-data" name="form1" align="center">

        <label for="">Tên Thể Loại:</label>
        <input type="text" name="TenTL" value="" /><br><br>

        <label for="">Thứ Tự:</label>
        <input type="text" name="ThuTu" value="" /><br><br>

        <label for=""> Ẩn Hiện</label>
        <select name="AnHien">
            <option value="0">Ẩn</option>
            <option value="1">Hiện</option>
        </select><br><br>

        <label>Biểu tượng hiện tại:</label><br>
        <input type="file" name="image" id="anh" /><br><br>


        <input type="submit" name="Them" value="Thêm" />
        <input type="reset" name="Huy" value="Huỷ" />

    </form>

</body>

</html>