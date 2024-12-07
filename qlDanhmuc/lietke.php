<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH DANH MỤC</title>
</head>
<?php
    include('../connect.php');
    $sql_select = "SELECT * FROM danhmuc";
    $query = mysqli_query($conn, $sql_select);
?>
<body> 
    
    <h2>Danh sách danh mục</h2>

    <table border="2">
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Thao tác</th>
        </tr>
        <?php 
            $i = 0;
            while($row = mysqli_fetch_assoc($query)){
                $i++ ;
            ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row['ten_danhmuc']?></td>
            <td>
                <a href="xuly.php?id=<?php echo $row['id_danhmuc']?>">Xóa</a>
                <a href="sua.php?id=<?php echo $row['id_danhmuc']?>">Sửa</a>
            </td>
        </tr>
        <?php }?>
    </table>
    <a href="them.php"> them danh muc</a>
</body>
</html>