<?php
    session_start();
    $kn = mysqli_connect("localhost:3806", "root", "", "coffees");
    if (!$kn) {
        die('Lỗi kết nối: ' . mysqli_connect_error());
    }
    if (isset($_POST['dangky'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $repassword =  md5($_POST['repassword']);
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $check_taikhoan = "SELECT * FROM tbl_user WHERE username = '$username'";
        $check_email = "SELECT * FROM tbl_user WHERE email = '$email'";

        $result_taikhoan = mysqli_query($kn, $check_taikhoan);
        if (!$fullname || !$username || !$password || !$repassword || !$email || !$phone) {
            echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
        } elseif (mysqli_num_rows($result_taikhoan) > 0) {
            echo '<script>alert("Tên đăng nhập đã tồn tại!")</script>';
        } elseif (mysqli_num_rows(mysqli_query($kn, $check_email)) > 0) {
            echo '<script>alert("Email đã tồn tại!")</script>';
        } elseif ($password != $repassword) {
            echo '<script>alert("Mật khẩu chưa trùng vui lòng nhập lại")</script>';
        } else {
            $sql_dangky = "INSERT INTO tbl_user(fullname,username,email,password,phone) VALUE('" . $fullname . "','" . $username . "','" . $email . "','" . $password . "','" . $phone . "')";
            $query_dangky = mysqli_query($kn, $sql_dangky);
            if ($query_dangky) {
                echo '<script>alert("Đăng ký thành công")</script>';
                $_SESSION['dangky'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['id_user'] = mysqli_insert_id($kn);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../user/signup.css" />
    <title>Đăng ký</title>
</head>

<body>

    <div class="home">
        <form action="" method="POST" class="wrapper-signup" id="form-1">
            <h2>Đăng ký</h2>

            <div class="input-box">
                <input id="fullname" name="fullname" type="text" />
                <label for="fullname">Tên đầy đủ</label>
                <span class="icon"><i class="fa-solid fa-circle-user"></i></span>
            </div>
            <div class="input-box">
                <input id="username" name="username" type="text" />
                <label for="username">Tên tài khoản</label>
                <span class="icon"><i class="fa-solid fa-user"></i></span>
            </div>

            <div class="input-box">
                <input id="email" name="email" type="text" />
                <label for="email">Email</label>
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
            </div>

            <div class="input-box">
                <input id="password" name="password" type="password" />
                <label for="password">Mật khẩu</label>
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
            </div>

            <div class="input-box">
                <input id="password_confirmation" name="repassword" type="password" />
                <label for="password_confirmation">Nhập lại mật khẩu</label>
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
            </div>

            <div class="input-box">
                <input id="phonenumber" name="phone" type="text" />
                <label for="phonenumber">Số điện thoại</label>
                <span class="icon"><i class="fa-solid fa-phone"></i></span>
            </div>
            <div>
                <input class="btn" type="submit" name="dangky" value="Đăng ký">
            </div>
            <div class="login">
                <p>Bạn đã có tài khoản?<a href="../user/login.php">Đăng nhập</a></p>
            </div>

        </form>
    </div>
</body>

</html>