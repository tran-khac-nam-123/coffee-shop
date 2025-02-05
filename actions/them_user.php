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
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $message = "";

        $check_taikhoan = "SELECT * FROM tbl_user WHERE username = '$username'";
        $check_email = "SELECT * FROM tbl_user WHERE email = '$email'";

        if(isset($_POST['themnguoidung'])){
            
            if (mysqli_num_rows(mysqli_query($kn, $check_taikhoan)) > 0) {
                $message = "Tên đăng nhập đã tồn tại.";
            } 

            else if (mysqli_num_rows(mysqli_query($kn, $check_email)) > 0) {
                $message = "Email đã tồn tại.";
            } 

            else {
                $sql_them = "INSERT INTO tbl_user(fullname, username, email, password, phone) 
                            VALUES ('$fullname', '$username', '$email', '$password', '$phone')";
                if (mysqli_query($kn, $sql_them)) {
                    header('Location: ../admin/index.php?action=quanlynguoidung&query=danhsach');
                } else {
                    echo "Lỗi khi thêm dữ liệu: " . mysqli_error($kn);
                }
            }
        }
    ?>
</body>
</html>