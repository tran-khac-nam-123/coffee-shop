<!-- menu section starts  -->

<section class="menu" id="menu">

    <h1 class="heading"><span>menu</span> </h1>

    <div class="box-container">
        <?php

        $sql = "select * from tbl_sanpham where tbl_sanpham.id_category=2";
        $kq = mysqli_query($kn, $sql);
        if (!$kq) {
            echo 'Lỗi truy vấn';
        }

        while ($row = mysqli_fetch_array($kq)) {
        ?>
            <form method="POST" action="views/main/giohang/addtocart.php?idsanpham=<?php echo $row['id_sanpham'] ?>">
                <div class="box">
                    <div class="image">
                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham'] ?>"><img src="images/<?php echo $row['hinhanh'] ?>"></a>
                    </div>
                    <h3><?php echo $row['tensp'] ?></h3>
                    <div class="price"><?php echo number_format($row['price'], 0, ',', '.') . ' VNĐ' ?></div>
                    <input type="hidden" name="soluong" value="1">
                    <input type="submit" name="themgiohang" class="btn" style="text-transform: none;" value="Thêm vào giỏ hàng">
                </div>
            </form>
        <?php
        }
        ?>
    </div>

</section>

<!-- menu section ends -->