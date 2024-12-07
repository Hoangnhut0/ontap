<?php
    include('../connect.php');

    $tendanhmuc = $_POST['ten_danhmuc'];
    if(isset($_POST['them'])){
        
        $sql_them = "INSERT INTO danhmuc(ten_danhmuc) VALUE ('$tendanhmuc')";
        //echo $sql_them;
        mysqli_query($conn, $sql_them);
        header('location: lietke.php');
    }elseif(isset($_POST['sua'])){
        $sql_sua = "UPDATE danhmuc SET ten_danhmuc = '$tendanhmuc' WHERE id_danhmuc = '$_GET[id]'";
        echo $sql_sua;
        mysqli_query($conn, $sql_sua);
        header('location: lietke.php');
    }else{
        $id = $_GET['id'];
        $sql_xoa = "DELETE FROM danhmuc WHERE id_danhmuc = '$id'";
        mysqli_query($conn, $sql_xoa);
        header('location: lietke.php');
    }
?>