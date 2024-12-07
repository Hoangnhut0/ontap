<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<?php
    include('../connect.php');
    $sql = "SELECT * FROM danhmuc";
    $query = mysqli_query($conn, $sql);
?>
<body>
    <h2>Thêm sản phẩm</h2>

    <form action="xuly.php" method="POST" enctype="multipart/form-data">
        <label for="">Tên sản phẩm:</label>
        <input type="text" name="ten_sanpham"> <br><br>
        <label for="">Hình ảnh</label>
        <input type="file" name="hinhanh"> <br><br>
        <label for="">Giá</label>
        <input type="text" name="gia"> <br><br>
        <label for="">Mô tả</label>
        <input type="text" name="mota"> <br><br>
        <label for="">Danh mục</label>
        <select name="id_danhmuc" id="">
            <?php while($row = mysqli_fetch_assoc($query)){?>
            <option value="<?php echo $row['id_danhmuc']?>"><?php echo $row['ten_danhmuc']?></option>
        <?php } ?>
        </select> <br> <br>
        <button name="them" type="submit">Thêm</button>
    </form>
</body>
</html>