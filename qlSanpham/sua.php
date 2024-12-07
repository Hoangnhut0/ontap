<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sua</title>
</head>
<?php
    include('../connect.php');
    $sql_select = "SELECT * FROM sanpham WHERE id_sanpham = '$_GET[id]'";
    $query_sua = mysqli_query($conn, $sql_select);
?>
<body>
    <h2>sua sản phẩm</h2>
    <?php while($row_select = mysqli_fetch_assoc($query_sua)){ ?>
    <form action="xuly.php?id=<?php echo $row_select['id_sanpham']?>" method="POST" enctype="multipart/form-data">
        <label for="">Tên sản phẩm:</label>
        <input type="text" name="ten_sanpham" value="<?php echo $row_select['ten_sanpham']?>"> <br><br>
        <label for="">Hình ảnh</label>
        <img src="img/<?php echo $row_select['hinhanh']?>" width="100px" alt="">
        <input type="file" name="hinhanh"><br><br>
        <label for="">Giá</label>
        <input type="text" name="gia" value="<?php echo $row_select['gia']?>"> <br><br>
        <label for="">Mô tả</label>
        <input type="text" name="mota" value="<?php echo $row_select['mota']?>"> <br><br>
        <label for="">Danh mục</label>
        <select name="id_danhmuc" id="">
            <?php 
                $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                    if($row_danhmuc['id_danhmuc']== $row_select['id_danhmuc']){?>
                        <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['ten_danhmuc']?></option>
                    <?php }else{?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['ten_danhmuc']?></option>
        <?php } }?>
        </select> <br> <br>
        <button name="sua" type="submit">sua</button>
    </form>
<?php }?>
</body>
</html>