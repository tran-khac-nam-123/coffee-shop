<!-- products section starts  -->

<section class="products" id="products">

    <h1 class="heading"> sản phẩm <span>bán chạy</span> </h1>

    <div class="box-container">
        <?php

        $sql = "select * from tbl_sanpham where tbl_sanpham.id_category = 1";
        $kq = mysqli_query($kn, $sql);
        if (!$kq) {
            echo 'Lỗi truy vấn';
        }

        while ($row = mysqli_fetch_array($kq)) {
        ?>
            
                <div class="box">
                    <div class="icons">
                        <a href="views/main/giohang/addtocart.php?id=<?php echo $row['id_sanpham']; ?>&soluong=1" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a class="fas fa-eye" href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham'] ?>"></a>
                    </div>

                    <div class="image">
                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham'] ?>"><img src="images/<?php echo $row['hinhanh'] ?>"></a>
                    </div>
                    <div class="content">
                        <h3><?php echo $row['tensp'] ?></h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="price"><?php echo number_format($row['price'], 0, ',', '.') . ' VNĐ' ?></div>
                        
                    </div>
                </div>
            
        <?php
        }
        ?>

    </div>

</section>

<!-- products section ends -->