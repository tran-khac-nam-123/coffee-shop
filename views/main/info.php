<?php
session_start();

$errors = $_SESSION['errors'] ?? [
    'password_old' => '',
    'password_new' => '',
];
unset($_SESSION['errors']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>

</head>

<body>
    <?php
    if (isset($_SESSION['dangky'])) {
        $id = $_SESSION['dangky'];
        $sql_thongtin = "SELECT * FROM tbl_user WHERE username='$id' LIMIT 1";
        $query_thongtin = mysqli_query($kn, $sql_thongtin);

        while ($row = mysqli_fetch_array($query_thongtin)) {
    ?>

        <div class="wrapper-container">
            <div class="wrapper-card">
                <div class="card">
                    <img src="images/user-profile.jpg" alt="Profile">
                    <h2><?php echo $row['username'] ?></h2>
                    <h3><?php echo $row['fullname'] ?></h3>

                    <div class="social-links">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                        <a href="#" class="fab fa-pinterest"></a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="tabs">
                    <div class="tab active" data-target="overview" style="text-transform: none;">Tổng quan</div>
                    <div class="tab" data-target="edit" style="text-transform: none;">Chỉnh sửa</div>
                    <div class="tab" data-target="change-password" style="text-transform: none;">Đổi mật khẩu</div>
                </div>
                <div class="content">
                    <section id="overview" class="active">
                        <div class="details">
                            <div style="padding-bottom: 20px;"><b style="text-transform: none;">Chi tiết</b></div>
                            <p><b style="text-transform: none;">Tên đầy đủ:</b> <?php echo $row['fullname']; ?></p>
                            <p style="text-transform: none;"><b style="text-transform: none;">Tên đăng nhập:</b> <?php echo $row['username']; ?></p>
                            <p style="text-transform: none;"><b style="text-transform: none;">Email:</b> <?php echo $row['email']; ?></p>
                            <p style="text-transform: none;"><b style="text-transform: none;">Số điện thoại:</b> <?php echo $row['phone']; ?></p>
                        </div>
                    </section>
                    <form action="/cafena/actions/change_info.php" method="POST">
                        <section class="edit" id="edit">
                            <div>
                                <label for="fullname" style="text-transform: none;">Tên đầy đủ</label>
                                <input class="input-style" name="fullname" type="text" style="margin-bottom: 10px; text-transform: none;" value="<?php echo $row['fullname']; ?>">
                            </div>
                            <div>
                                <label for="email" style="text-transform: none;">Email</label>
                                <input class="input-style" type="text" name="email" style="margin-bottom: 10px; text-transform: none;" value="<?php echo $row['email']; ?>">
                            </div>
                            <div>
                                <label for="phone" style="text-transform: none;">Số điện thoại </label>
                                <input class="input-style" type="text" name="phone" value="<?php echo $row['phone']; ?>">
                            </div>
                            <div>
                                <button type="submit" name="changeinfo" style="text-transform: none;">Lưu thay đổi</button>
                            </div>
                        </section>
                        <section class="change-password" id="change-password">
                            <div>
                                <label for="password_old" style="text-transform: none;">Mật khẩu hiện tại</label>
                                <input class="input-style" id="password_old" name="password_old" type="password" style="margin-bottom: 10px; text-transform: none;" placeholder="••••••••">
                                <span id="password-old-error" class="error-message" style="color: red;">
                                    <?php echo $errors['password_old']; ?>
                                </span><br>
                            </div>
                            <div>
                                <label for="passwork-old" style="text-transform: none;">Mật khẩu mới</label>
                                <input class="input-style" type="password" name="password_new" style="margin-bottom: 10px; text-transform: none;" placeholder="Nhập ít nhất 6 ký tự">
                                <span id="password-old-error" class="error-message" style="color: red;">
                                    <?php echo $errors['password_new']; ?>
                                </span><br>
                            </div>
                            <div>
                                <label for="re-passwork-old" style="text-transform: none;">Nhập lại mật khẩu mới</label>
                                <input class="input-style" type="password" name="repassword_new" style="text-transform: none;" placeholder="Nhập ít nhất 6 ký tự">
                            </div>
                            <div>
                                <button type="submit" name="changepassword" style="text-transform: none;">Đổi mật khẩu</button>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    <?php
        }
    }

    ?>
    <script>
        const tabs = document.querySelectorAll('.tab');
        const sections = document.querySelectorAll('section');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                sections.forEach(section => section.classList.remove('active'));
                document.getElementById(tab.dataset.target).classList.add('active');
            });
        });
    </script>
</body>

</html>