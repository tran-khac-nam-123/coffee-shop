<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/cafena/actions/xl_dathang.php" method="POST">
        <div class="containers">
            <div class="header-title">
                <p><a href="index.php"><b>Cafena</b></a> &nbsp;Thanh toán</p>
            </div>

            <div class="address">
                <div class="rim"></div>
                <?php

                if (isset($_SESSION['dangky'])) {
                    $id = $_SESSION['dangky'];
                    $sql_thongtin = "SELECT * FROM tbl_user WHERE username='$id' LIMIT 1";
                    $query_thongtin = mysqli_query($kn, $sql_thongtin);

                    while ($row = mysqli_fetch_array($query_thongtin)) {
                ?>
                        <div class="title">
                            <p><i class="fa-solid fa-location-dot"></i> &nbsp; Địa chỉ nhận hàng</p>
                            <div class="info-order">
                                <p><b>Họ và tên:</b> <?php echo $row['fullname'] ?> </p>
                                <p><b>Số điện thoại:</b> <?php echo $row['phone'] ?> </p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="info-address">
                        <p><b>Địa chỉ:</b> </p>
                        <input type="text" name="diachi">
                    </div>
            </div>

            <div class="info-product">
                <table>
                    <tr style="margin-bottom: 30px;">
                        <td>Sản phẩm</td>
                        <td style="text-align: center;">Đơn giá</td>
                        <td style="text-align: center;">Số lượng</td>
                        <td style="text-align: center;">Số tiền</td>
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
                                <td style="display: flex;"><img style="width: 13%; height: 94px; margin: 20px 0px" class="img-cart" src="images/<?php echo $cart_item['hinhanh'] ?>"><b style="margin: 55px 0px 0px 10px;"><?php echo $cart_item['tensp'] ?></b></td>
                                <td style="text-align: center;"><?php echo number_format($cart_item['price'], 0, ',', '.') . ' VNĐ' ?></td>
                                <td style="text-align: center;">
                                    <div class="soluong-sp-dem" style="margin:0 auto;">
                                        <input style="width: 30px; padding: 3px 10px;" type="text" name="soluong" value="<?php echo $cart_item['soluong'] ?>">
                                    </div>
                                </td>

                                <td class="giasp-cart" style="text-align: center;"><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>

                            </tr>
                        <?php
                        }

                        ?>

                <?php
                    }
                }
                ?>
                </table>
            </div>

            <div class="wrapper-order">

                <div class="payment">
                    <p style="margin-top: 6px;">Phương thức thanh toán</p>
                    <div class="radio-inputs">
                        <label class="radio">
                            <input class="name-title" type="radio" name="payment" value="MOMO" id="momo-option">
                            <span class="name">Ví MOMO</span>
                            <!-- <input style="display: none;" type="submit" name="momoatm" value="Ví MOMO"> -->
                        </label>
                        <label class="radio">
                            <input class="name-title" type="radio" name="payment" value="VNPAY" id="vnpay-option">
                            <span class="name">Ví VNPay</span>
                            <!-- <input style="display: none;" type="submit" name="redirect" value="Ví VNPAY"> -->
                        </label>
                        <label class="radio">
                            <input class="name-title" type="radio" name="payment" value="COD" id="cod-option" checked="">
                            <span class="name" style="text-transform: none;">Thanh toán khi nhận hàng</span>
                            <!-- <input style="display: none;" type="submit" name="cod" value="Thanh toán khi nhận hàng"> -->
                        </label>
                    </div>
                </div>


                <hr>
                <table>
                    <tr>
                        <td colspan="5">
                            <p style="color: red;font-weight: bold;font-size: 16px; float: right; text-transform: none;"> Tổng thanh toán : <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'  ?></p>
                            <div style="clear:both;"> </div>
                            <?php
                            if (isset($_SESSION['dangky'])) {

                            ?>
                                <button class="btn" type="submit" name="dathang" style="background-color: red; float: right; padding: 10px 45px; color: #fff; margin-top: 30px; font-size: 1.6em;">Đặt hàng</button>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>

            </div>

        </div>
    </form>

    <!-- <script>
        // Lắng nghe sự thay đổi của radio buttons
        document.addEventListener('DOMContentLoaded', function() {
            const momoOption = document.getElementById('momo-option');
            const momoButtons = document.getElementById('momo-buttons');

            // Hiển thị nút MOMO khi được chọn
            momoOption.addEventListener('change', function() {
                if (this.checked) {
                    momoButtons.style.display = 'block';
                }
            });

            // Ẩn nút MOMO khi chọn phương thức khác
            const otherOptions = document.querySelectorAll('#vnpay-option, #cod-option');
            otherOptions.forEach(option => {
                option.addEventListener('change', function() {
                    if (this.checked) {
                        momoButtons.style.display = 'none';
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const vnpayOption = document.getElementById('vnpay-option');
            const vnpayButtons = document.getElementById('vnpay-buttons');

            // Hiển thị nút MOMO khi được chọn
            vnpayOption.addEventListener('change', function() {
                if (this.checked) {
                    vnpayButtons.style.display = 'block';
                }
            });

            // Ẩn nút MOMO khi chọn phương thức khác
            const otherOptions = document.querySelectorAll('#momo-option, #cod-option');
            otherOptions.forEach(option => {
                option.addEventListener('change', function() {
                    if (this.checked) {
                        vnpayButtons.style.display = 'none';
                    }
                });
            });
        });
    </script> -->
</body>

</html>