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
        $id = $_GET['id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $message = "";

        $check_taikhoan = "SELECT * FROM tbl_user WHERE username = '$username'";
        $check_email = "SELECT * FROM tbl_user WHERE email = '$email'";

        if(isset($_POST['suanguoidung'])){
            
            $sql_sua = "UPDATE tbl_user SET fullname='".$fullname."', username='".$username."', email='".$email."',phone='".$phone."' where id_user = '$id'";
            if (mysqli_query($kn, $sql_sua)) {
                header('Location: ../admin/index.php?action=quanlynguoidung&query=danhsach');
            } else {
                echo "Lỗi khi thêm dữ liệu: " . mysqli_error($kn);
            }

        }else{
            $id = $_GET['id'];
            $sql_xoa = "DELETE FROM tbl_user WHERE id_user = '$id';";
            if(mysqli_query($kn,$sql_xoa)){
                header('Location:../admin/index.php?action=quanlynguoidung&query=danhsach');
            }
        }
    ?>
</body>
</html>