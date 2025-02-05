<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Xem chi tiết sản phẩm</title>

</head>

<body>

    <section class="details" style="margin-top: 10em;">

        <?php

        $sql_chitiet = "select * from tbl_sanpham where tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
        $kq = mysqli_query($kn, $sql_chitiet);
        if (!$kq) {
            echo 'Lỗi truy vấn';
        }

        while ($row_chitiet = mysqli_fetch_array($kq)) {
        ?>
            <form method="POST" action="views/main/giohang/addtocart.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                <div class="row">

                    <div class="image">
                        <img src="images/<?php echo $row_chitiet['hinhanh'] ?>">
                    </div>

                    <div class="content">
                        <h3><?php echo $row_chitiet['tensp'] ?></h3>
                        <div class="price">
                            <div>
                                <?php $salerandom = rand(10, 60) ?>
                                <?php echo number_format($row_chitiet['price'], 0, ',', '.') ?> VNĐ
                                <span><?php echo number_format($row_chitiet['price'] * ($salerandom / 100) + $row_chitiet['price'], 0, ',', '.') ?> VNĐ</span>
                            </div>
                            <div class="sale"> - <?php echo  $salerandom ?>%</div>
                        </div>

                        <p><b>Xuất xứ:</b> <?php echo $row_chitiet['xuatxu'] ?></p>
                        <p><b>Dạng đồ uống:</b> <?php echo $row_chitiet['dangdouong'] ?></p>
                        <p><b>Loại thực phẩm:</b> <?php echo $row_chitiet['loaithucpham'] ?></p>
                        <p><b>Hạn sử dụng:</b> <?php echo $row_chitiet['hansudung'] ?></p>

                        <div class="soluong-sp" style="display: flex;">
                            <p><b>Số lượng:</b></p>
                            <div class="soluong-sp-dem" style="background-color: #fff; border: 2px solid green; width: 14%; margin:13px 0px 10px 0px;">
                                <a class="soluong-sp-dem-icon" style="padding-left: 8px; padding-right: 4px;" href="views/main/giohang/upt_soluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                                <input style="width: 35px; padding: 3px 9px 3px 10px; border: 0.1px solid green;" class="soluong-sp-input" type="text" name="soluong" value="1">
                                <a class="soluong-sp-dem-icon" style="padding-right: 8px; padding-left: 4px;" href="views/main/giohang/upt_soluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                            </div>
                            <p style="display: none;" class="soluong-sp-cosan"><?php echo $row_chitiet['soluong'] ?></p><span class="soluong-sp-cosan-text"></span>
                        </div>
                        <div style="font-size: 16px; margin-top: 10px; text-transform: none;" class="error-message"></div>
                        <input type="submit" class="btn" name="themgiohang" value="Thêm vào giỏ hàng" />
                        <button class="btn-buy">Mua ngay</button>
                    </div>

                </div>

                <div class="description">
                    <div class="content">
                        <p class="title"><b>mô tả sản phẩm</b></p>
                        <p style="white-space: pre-wrap; line-height: 2.0; text-transform: none;"><?php echo $row_chitiet['mota'] ?></p>
                    </div>
                </div>
            </form>
        <?php
        }
        ?>

    </section>

    <script type="text/javascript">
    var soluong = document.querySelector('.soluong-sp-input');
    var demPlus = document.querySelector('.soluong-sp-dem-icon .fa-plus');
    var demMins = document.querySelector('.soluong-sp-dem-icon .fa-minus');
    var soluongMaxElement = document.querySelector('.soluong-sp-cosan');

    if (soluong && demPlus && demMins && soluongMaxElement) {
        var soluongMax = parseInt(soluongMaxElement.innerHTML, 10);

        demPlus.addEventListener('click', function() {
            var currentQuantity = parseInt(soluong.value, 10);
            if (currentQuantity >= soluongMax) {
                soluong.value = soluongMax;
                showError("Số lượng sản phẩm còn lại chỉ còn: " + soluongMax);
            } else {
                soluong.value = currentQuantity + 1;
            }
        });

        demMins.addEventListener('click', function() {
            var currentQuantity = parseInt(soluong.value, 10);
            if (currentQuantity <= 1) {
                soluong.value = 1;
                showError('Số lượng sản phẩm phải lớn hơn hoặc bằng 1');
            } else {
                soluong.value = currentQuantity - 1;
            }
        });
    } else {
        console.error("Không tồn tại.");
    }

    var errorMessage = document.querySelector('.error-message');

    function showError(message) {
        errorMessage.textContent = message;
        errorMessage.style.color = 'red';
        setTimeout(function() {
            errorMessage.textContent = '';
        }, 3000);
    }
</script>

</body>

</html>