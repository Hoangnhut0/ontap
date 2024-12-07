<?php
    include('../connect.php');

    $tensanpham = $_POST['ten_sanpham'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $iddanhmuc = $_POST['id_danhmuc'];

    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

    if(isset($_POST['them'])){
        $sql_them = "INSERT INTO sanpham(ten_sanpham, hinhanh, gia, mota, id_danhmuc)
        VALUE ('$tensanpham', '$hinhanh', '$gia', '$mota', '$iddanhmuc')";
        mysqli_query($conn, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'img/' .$hinhanh);
        header('location: lietke.php');
    }elseif(isset($_POST['sua'])){
        if($hinhanh != ''){
            $sql_sua = "UPDATE sanpham SET ten_sanpham = '$tensanpham', hinhanh = '$hinhanh', gia = '$gia', mota = '$mota', id_danhmuc = '$iddanhmuc' WHERE id_sanpham = '$_GET[id]'";
            move_uploaded_file($hinhanh_tmp, 'img/' .$hinhanh);
            $sql = "SELECT *FROM sanpham WHERE id_sanpham = '$_GET[id]'";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                unlink('img/'.$row['hinhanh']);
            }
        }else{
            $sql_sua = "UPDATE sanpham SET ten_sanpham = '$tensanpham', gia = '$gia', mota = '$mota', id_danhmuc = '$iddanhmuc' WHERE id_sanpham = '$_GET[id]'";
        }
        mysqli_query($conn, $sql_sua);
        header('location: lietke.php');
    }else{
        $id = $_GET['id'];
        $sql_xoa = "DELETE FROM sanpham WHERE id_sanpham = '$id'";
        mysqli_query($conn, $sql_xoa);
        header('location: lietke.php');
    }
?>