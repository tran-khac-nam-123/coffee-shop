<?php
    $kn = mysqli_connect("localhost:3806","root","","coffees");
    if(!$kn){
        echo 'Lỗi kết nối';
    }

    $id = $_GET['id_contact'];
    $sql_xoa = "DELETE FROM tbl_contact WHERE id_contact = '$id';";
    if(mysqli_query($kn,$sql_xoa)){
        header('Location:../admin/index.php?action=quanlyphanhoi&query=danhsach');
    }
?>