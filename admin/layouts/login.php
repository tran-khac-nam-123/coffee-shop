<?php
session_start();

$kn = mysqli_connect("localhost:3806","root","","coffees");
if(!$kn){
    echo "Lỗi kết nối";
}

if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql_nguoidung = "SELECT * FROM tbl_admin WHERE username='" . $username . "' AND password='" . $password . "'  LIMIT 1";
    $row_nguoidung = mysqli_query($kn, $sql_nguoidung);
    $count = mysqli_num_rows($row_nguoidung);

    if ($count > 0) {
        $_SESSION['dangnhap'] = $username;
        header("Location: /cafena/admin/index.php");
    } else {
        $message = "Tài khoản mật khẩu không đúng";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="/hostay/public/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/cafena/assets/vendor/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            padding: 0;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .top-5 {
            top: 5%;
        }
    </style>
</head>
<body>
    <div class="toast position-absolute top-5 start-50 translate-middle-x"
        role="alert"
        aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header">
            <div class="rounded-circle me-2 p-2 bg-danger"></div>
            <strong class="me-auto text-danger">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-danger">
        <?php
        if(isset($_GET["err"])) {
            switch($_GET["err"]) {
                case "invalid":
                    echo "Tài khoản hoặc mật khẩu không đúng!";
                    break;
                case "value":
                    echo "Vui lòng điền đầy đủ thông tin!";
                    break;
                case "permis":
                    echo "Bạn không đủ thẩm quyền để truy cập trang này! 
                    Vui lòng đăng nhập bằng tài khoản có quyền cao hơn!";
                    break;
                default:
                    break;
            }
        }
        ?>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-5 py-3">
                <form action="" method="post" class="needs-validation" novalidate>
                    <div class="row text-center mx-2 fs-3 fw-bold">
                        <p>ADMIN LOGIN</p>
                    </div>
                    <div class="row mt-3 mx-2">
                        <label for="validationCustom01" class="form-label">Tên đăng nhập</label>
                        <input type="text"
                            class="form-control"
                            id="validationCustom01"
                            name="username"
                            placeholder="Username"
                            required>
                        <div class="invalid-feedback">
                            Tên đăng nhập không được để trống!
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <label for="validationCustom02" class="form-label">Mật khẩu</label>
                        <input type="password"
                            class="form-control"
                            id="validationCustom02"
                            name="password"
                            placeholder="Password"
                            required>
                        <div class="invalid-feedback">
                            Hãy nhập mật khẩu!
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary px-4" name="dangnhap">Đăng nhập</button>
                        </div>
                    </div>
                    <div class="row mt-3 mx-2 text-center">
                        <span>Bạn chưa có tài khoản?<a href="/cafena/user/signup.php">Đăng ký</a></span>
                    </div>
                    <div class="row mx-2 text-center">
                        <a href="/cafena/index.php">Trang chủ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/cafena/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()

            const toastElList = document.querySelector('.toast');
            const toast = new bootstrap.Toast(toastElList);
        
    </script>
</body>
</html>