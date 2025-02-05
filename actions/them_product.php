<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $kn = mysqli_connect("localhost:3806","root","","coffees");
        if(!$kn){
            echo 'Lỗi kết nối';
        }

        $masp = $_POST['masp'];
        $tensp = $_POST['tensp'];
        $hinhanh = $_POST['hinhanh'];
        $price = $_POST['price'];
        $xuatxu = $_POST['xuatxu'];
        $dangdouong = $_POST['dangdouong'];
        $loaithucpham = $_POST['loaithucpham'];
        $hansudung = $_POST['hansudung'];
        $soluong = $_POST['soluong'];
        $mota = $_POST['mota'];

        if(isset($_POST['themsanpham'])){
            $sql_them = "INSERT INTO tbl_sanpham (masp, tensp, price, xuatxu, dangdouong, loaithucpham, hansudung, soluong, hinhanh, mota, id_category) 
                        VALUES ('$masp', '$tensp', '$price', '$xuatxu', '$dangdouong', '$loaithucpham', '$hansudung', '$soluong', '$hinhanh', '$mota',1)";
            if (mysqli_query($kn, $sql_them)) {
                header('Location: ../admin/index.php?action=quanlysanpham&query=danhsach');
            } else {
                echo "Lỗi khi thêm dữ liệu: " . mysqli_error($kn);
            }
            
        }
    ?>
</body>
</html>