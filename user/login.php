<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../user/login.css">
    <title>Login</title>
    
</head>
<body>

    <?php
        session_start();
        $kn = mysqli_connect("localhost:3806","root","","coffees");
        if(!$kn){
            die('Lỗi kết nối: ' . mysqli_connect_error());
        }
        if (isset($_POST['dangnhap'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_user WHERE tbl_user.username='" . $username . "' AND tbl_user.password='" . $password . "'  LIMIT 1";
        $row = mysqli_query($kn, $sql);
        $count = mysqli_num_rows($row);
        if ($count > 0) {
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['username'];
            $_SESSION['email'] = $row_data['email'];
            $_SESSION['id_user'] = $row_data['id_user'];
            header("Location:../index.php");
        } elseif ($username == 'admin') {
            header("Location: /cafena/admin/layouts/login.php");
        } else {
            $message = "Tài khoản mật khẩu không đúng";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        }
    ?>

    <div class="home">
        <form action="" method="POST" class="wrapper-login">
            <h2>Đăng nhập</h2>
            <div class="input-box">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <input  type="text" name="username" require>
                <label>Tên đăng nhập</label><br>
            </div>

            <div class="input-box">
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" require>
                <label>Mật khẩu</label><br>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Lưu thông tin</label>
                <a href="#">Quên mật khẩu?</a>
            </div>
            <div>
                <input class="btn" type="submit" name="dangnhap" value="Đăng nhập">
            </div>
            <div class="register">
                <p>Bạn chưa có tài khoản? <a href="../user/signup.php">Đăng ký</a></p>
            </div>
        </form>
    </div>
</body>
</html>