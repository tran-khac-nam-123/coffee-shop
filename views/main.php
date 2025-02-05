<div class="main">
    <?php

    ?>
    <div class="maincontent">

        <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
        if (isset($_GET['quanly'])) {
            $bientam = $_GET['quanly'];
        } else {
            $bientam = "";
        }
        if ($bientam == 'gioithieu') {
            include("main/about.php");
        } elseif ($bientam == 'giohang') {
            include("main/giohang/cart.php");
        } elseif ($bientam == 'dangky') {
            header("Location:user/signup.php");
        } elseif ($bientam == 'contact') {
            include("main/contact.php");
        } elseif ($bientam == 'blog') {
            include("main/blogs.php");
        } elseif ($bientam == 'chitietsanpham') {
            include("main/coffees.php");
        } elseif ($bientam == 'sanpham') {
            include("main/sanpham.php");
        } elseif ($bientam == 'sanphammoi') {
            include("main/sanphamnoi.php");
        } elseif ($bientam == 'dangnhap') {
            header("Location:user/login.php");
        } elseif ($bientam == 'thongtin') {
            include("main/info.php");
        } elseif ($bientam == 'dathang') {
            include("main/thanhtoan/dathang.php");
        } elseif ($bientam == 'timkiem') {
            include("actions/timkiem.php");
        } else {
        ?>
            <section class="home" id="home">

                <div class="content">
                    <h3>cà phê tươi vào buổi sáng</h3>
                    <p>Hãy có niềm vui trong lao động, hãy có sự phân biệt trong mong muốn chối bỏ thời gian..</p>
                    <a href="#" class="btn">bắt đầu ngay</a>
                </div>

            </section>
        <?php

        }
        ?>

    </div>
</div>