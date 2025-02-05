<?php
$kn = mysqli_connect("localhost:3806", "root", "", "coffees");
if (!$kn) {
    echo 'Lỗi kết nối';
}
$errors = [];
session_start();
$id_user = $_SESSION['id_user'];
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];

echo "<script>console.log('ID User: " . $id_user . "');</script>";

if (isset($_POST['changeinfo'])) {
    $sql_sua = "UPDATE tbl_user SET fullname='" . $fullname . "', email='" . $email . "', phone='" . $phone . "' WHERE id_user = '$id_user'";
    if (mysqli_query($kn, $sql_sua)) {
        header('Location: /cafena/index.php?quanly=thongtin');
    } else {
        echo "Lỗi khi cập nhật thông tin: " . mysqli_error($kn);
    }
} elseif (isset($_POST['changepassword'])) {
    $password_old = $_POST['password_old'];
    $password_new = $_POST['password_new'];
    $repassword_new = $_POST['repassword_new'];

    $current_password = md5($password_old);
    $sql_check = "SELECT password FROM tbl_user WHERE id_user = '$id_user'";
    $result = mysqli_query($kn, $sql_check);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        if ($current_password == $row['password']) {

            if ($password_new == $repassword_new) {

                $new_password = md5($password_new);

                $sql_update_password = "UPDATE tbl_user SET password='$new_password' WHERE id_user = '$id_user'";
                if (mysqli_query($kn, $sql_update_password)) {
                    session_destroy();
                    echo "<script>
                            alert('Mật khẩu đã được thay đổi thành công! Vui lòng đăng nhập lại.');
                            window.location.href = '/cafena/user/login.php';
                          </script>";
                } else {
                    echo "<script>
                            alert('Có lỗi xảy ra khi cập nhật mật khẩu!');
                          </script>" . mysqli_error($kn);
                }
            } else {
                echo "<script>
                        alert('Mật khẩu mới và xác nhận mật khẩu không khớp!');
                        window.location.href = '/cafena/index.php?quanly=thongtin';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Mật khẩu hiện tại không chính xác!');
                    window.location.href = '/cafena/index.php?quanly=thongtin';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Có lỗi xảy ra khi kiểm tra mật khẩu hiện tại!');
              </script>" . mysqli_error($kn);
    }
} else {
    echo "";
}


?>
