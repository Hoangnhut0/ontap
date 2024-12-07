<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach san pham</title>
</head>
<?php 
    include('../connect.php');
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }else{
        $tukhoa = '';
    }
    $sql = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc = danhmuc.id_danhmuc 
    AND sanpham.ten_sanpham LIKE '%".$tukhoa."%'
    AND sanpham.gia LIKE '%".$tukhoa."%'";
    $query = mysqli_query($conn, $sql);
?>
<body>
    <h2> danh sach san pham</h2>
    <form action="lietke.php" method="POST">
                    <input type="text" placeholder="Search" name="tukhoa">
                    <button type="submit" name="timkiem"> tim </button>
                </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ten san pham</th>
            <th>hinh anh</th>
            <th>gia</th>
            <th>mota</th>
            <th>danhmuc</th>
            <th>thao tac</th>
        </tr>
        <?php
            $i = 0;
            while($row = mysqli_fetch_assoc($query)){
                $i++;
        ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row['ten_sanpham']?></td>
            <td><img src="img/<?php echo $row['hinhanh']?>" alt="" width="100px"></td>
            <td><?php echo $row['gia']?></td>
            <td><?php echo $row['mota']?></td>
            <td><?php echo $row['ten_danhmuc']?></td>
            <td>
                <a href="xuly.php?id=<?php echo $row['id_sanpham']?>">xoa</a>
                <a href="sua.php?id=<?php echo $row['id_sanpham']?>">sua</a>
            </td>
        </tr>
        <?php }?>
    </table>
    <a href="them.php" type="submit">Them san pham</a>
</body>
</html>