<?php
    $kn = mysqli_connect("localhost:3806","root","","coffees");
    if(!$kn){
        echo 'Lỗi kết nối';
    }

    $id_sanpham = $_GET['id_sp'];
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $price = $_POST['price'];
    $xuatxu = $_POST['xuatxu'];
    $dangdouong = $_POST['dangdouong'];
    $loaithucpham = $_POST['loaithucpham'];
    $hansudung = $_POST['hansudung'];
    $soluong = $_POST['soluong'];
    $mota = $_POST['mota'];

    $hinhanh = "";
    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
        $hinhanh = basename($_FILES['hinhanh']['name']);
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], 'uploads/' . $hinhanh);
    }

    if(isset($_POST['suasanpham'])){

        $sql_sua = "UPDATE tbl_sanpham 
                    SET masp='".$masp."', 
                    tensp='".$tensp."',
                    price='".$price."', 
                    xuatxu='".$xuatxu."', 
                    dangdouong='".$dangdouong."', 
                    loaithucpham='".$loaithucpham."', 
                    hansudung='".$hansudung."', 
                    soluong='".$soluong."', 
                    hinhanh='".$hinhanh."',
                    mota='".$mota."'
                    where id_sanpham = '$id_sanpham'";
        if (mysqli_query($kn, $sql_sua)) {
            header('Location: ../admin/index.php?action=quanlysanpham&query=danhsach');
        } else {
            echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($kn);
        }

    }else{
        $id_sanpham = $_GET['id_sp'];
        $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham = '$id_sanpham';";
        if(mysqli_query($kn,$sql_xoa)){
            header('Location:../admin/index.php?action=quanlysanpham&query=danhsach');
        }
        
    }
?>
