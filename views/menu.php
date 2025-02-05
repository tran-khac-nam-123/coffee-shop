<header class="header">

    <a href="../cafena/index.php" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar" style="margin-left: 5%;">
        <a href="index.php">Trang chủ</a>
        <a href="index.php?quanly=gioithieu">Giới thiệu</a>
        <a href="index.php?quanly=contact">Liên hệ</a>
        <a href="index.php?quanly=blog">blogs</a>
    </nav>

    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
        <a href="index.php?quanly=giohang" class="fas fa-shopping-cart" id="cart-btn"></a>
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-circle-user" id="login-btn"></div>
    </div>

    <?php

    if (isset($_SESSION['dangky'])) {
    ?>
        <div class="user-menu" id="user-menu" style="text-transform: none;">
            <a class="profile-btn" href="index.php?quanly=thongtin" style="text-transform: none;">Thông tin cá nhân</a>
            <a class="logout-btn" href="index.php?dangxuat=1" style="text-transform: none;">Đăng xuất</a>
        </div>
    <?php
    } else {
    ?>
        <div class="login-menu" id="login-menu">
            <a class="login-btn" href="index.php?quanly=dangnhap" style="text-transform: none;">Đăng nhập</a>
            <a class="register-btn" href="index.php?quanly=dangky" style="text-transform: none;">Đăng ký</a>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
        session_destroy();
        header("Location: index.php");
        exit();
    }
    ?>

    <form method="POST" action="index.php?quanly=timkiem" class="search-form">
        <input type="text" id="search-box" placeholder="Nhập từ khóa cần tìm kiếm..." name="tukhoa">
        <button for="search-box" type="submit" name="timkiem" class="fas fa-search"></button>
    </form>

    <div class="cart-items-container">
    
        <a href="checkout.php" class="btn">Thanh toán ngay</a>
    </div>

</header>