<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SỬA DANH MỤC</title>
</head>
<?php
    include('../connect.php');
    $sql_select = "SELECT * FROM danhmuc WHERE id_danhmuc = '$_GET[id]'";
    $query = mysqli_query($conn, $sql_select);
?>
<body>
    <h2>Sửa danh mục</h2>
    <?php
        while($row = mysqli_fetch_assoc($query)){
    ?>
    <form action="xuly.php?id=<?php echo $row['id_danhmuc']?>" method="POST">
        <label for="">Tên danh mục:</label>
        <input type="text" name="ten_danhmuc" value="<?php echo $row['ten_danhmuc']?>"><br>
        <button type="submit" name="sua"> Sửa</button>
    </form>
    <?php } ?>
</body>
</html>