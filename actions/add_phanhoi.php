<?php
    $kn = mysqli_connect("localhost:3806","root","","coffees");
    if(!$kn){
        echo 'Lỗi kết nối';
    }
    $fullname = $_POST['fullname'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $email = $_POST['email'];

    session_start();
    $id_user = $_SESSION['id_user'];

    if(isset($_POST['themphanhoi'])){
        $sql_them = "INSERT INTO tbl_contact (id_user, fullname, email, title, message) 
                    VALUES ('$id_user', '$fullname', '$email', '$title', '$message')";
        if (mysqli_query($kn, $sql_them)) {
            header('Location: /cafena/index.php?quanly=contact');
        } else {
            echo "Lỗi khi thêm dữ liệu: " . mysqli_error($kn);
        }
        
    }
?>
