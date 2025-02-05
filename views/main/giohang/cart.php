<p><?php
    if (isset($_SESSION['dangky'])) {
    }
    ?></p>


<?php
if (isset($_SESSION['carts'])) {
}

?>
<hr />

<table border="0" style="margin: 120px 20px 20px 100px; color: #fff; font-size: 1.6em; width:85%; height: auto;">
    <tr style="margin-bottom: 30px;">
        <td>Sản phẩm</td>
        <td style="text-align: center;">Đơn giá</td>
        <td style="text-align: center;">Số lượng</td>
        <td style="text-align: center;">Số tiền</td>
        <td style="text-align: center;">Thao tác</td>
    </tr>
    <?php
    if (isset($_SESSION['carts'])) {
        $i = 0;
        $tongtien = 0;
        foreach ($_SESSION['carts'] as $cart_item) {
            $thanhtien = $cart_item['soluong'] * $cart_item['price'];
            $tongtien += $thanhtien;
            $i++;
    ?>
            <tr>
                <td style="display: flex;"><img style="width: 15%; height: 94px; margin: 20px 0px" class="img-cart" src="images/<?php echo $cart_item['hinhanh'] ?>"><b style="margin: 55px 0px 0px 10px;"><?php echo $cart_item['tensp'] ?></b></td>
                <td style="text-align: center;"><?php echo number_format($cart_item['price'], 0, ',', '.') . ' VNĐ' ?></td>
                <td style="text-align: center;">
                    <div class="soluong-sp-dem" style="background-color: #fff; border: 2px solid green; width: 44%; margin:0 auto;">
                        <a class="soluong-sp-dem-icon" style="padding-left: 8px; padding-right: 4px;" href="views/main/giohang/upt_soluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                        <input style="width: 30px;padding: 3px 10px; border: 0.1px solid green;" type="text" name="soluong" value="<?php echo $cart_item['soluong'] ?>">
                        <a class="soluong-sp-dem-icon" style="padding-right: 8px; padding-left: 4px;" href="views/main/giohang/upt_soluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                    </div>
                </td>

                <td class="giasp-cart" style="text-align: center;"><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
                <td style="text-align: center;"><a style="color: #fff;" href="views/main/giohang/delete_product.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
            </tr>
        <?php
        }
        echo "<hr/>";
        ?>
        <tr>
            <td colspan="5">
                <p style="color: #fff;font-weight: bold;font-size: 16px; float: right; text-transform: none;"> Tổng thanh toán : <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'  ?></p>
                <div style="clear:both;"> </div>
                <?php
                if (isset($_SESSION['dangky'])) {

                ?>
                    <p class="btn-dathang"><a class="btn-dathang-a" style="background-color: red; float: right; padding: 10px 45px; color: #fff; margin-top: 30px;" href="index.php?quanly=dathang">Mua hàng</a></p>
                <?php
                } else {

                ?>
                    <p><a href="index.php?quanly=dangnhap" style="color: #fff; text-transform: none;">Đăng nhập đặt hàng</a></p>
                <?php
                }

                ?>
            </td>
        </tr>
    <?php
    } else {
    ?>
        <hr>
        <tr style="text-align: center;">
            <td colspan="6"><img style="width: 20%;" src="images/cart-empty.png" alt=""></td>
        </tr>
        <tr>
            <td colspan="6" style="text-transform: none; text-align: center;">Giỏ hàng của bạn còn trống</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="6"><a href="/cafena/index.php" class="btn">Mua ngay</a></td>
        </tr>
    <?php
    }
    ?>
</table>
<p></p>