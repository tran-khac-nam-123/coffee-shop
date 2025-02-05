<!-- Tesst TT -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/cafena/assets/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/cafena/assets/vendor/bootstrap/css/bootstrap.min.css">
    <script src="/Cafena/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/cafena/assets/vendor/html2canvas/html2canvas.min.js"></script>
    <script src="/cafena/assets/vendor/html2pdf/node_modules/html2pdf.js/dist/html2pdf.bundle.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #131417;
        }

        .ticket {
            margin: auto;
            width: 900px;
        }
    </style>
</head>

<body>
    <?php

    $kn = mysqli_connect("localhost:3806", "root", "", "coffees");
    if (!$kn) {
        echo "Lỗi kết nối";
    }
    session_start();
    $id_user = $_SESSION['id_user'];

    $sql = "SELECT 
                o.diachi AS diachi,
                u.fullname AS fullname,
                u.email AS email,
                u.phone AS phone
            FROM 
                tbl_order AS o
            JOIN 
                tbl_user AS u
            ON 
                u.id_user = o.id_user
            WHERE u.id_user = '$id_user' LIMIT 1;";
    $kq = mysqli_query($kn, $sql);
    if (!$kq) {
        echo 'Lỗi truy vấn';
    }

    while ($row = mysqli_fetch_array($kq)) {
    ?>
        <form action="thanhtoan.php" method="POST">
            <div class="container">
                <div class="row text-white my-3">
                    <h1 align="center">Hóa Đơn Mua Hàng</h1>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <a class="btn btn-primary mx-3 btn-goback"><i class="bi bi-reply"></i> Quay lại</a>
                    <a class="btn btn-primary mx-3" href="/cafena/index.php"><i class="bi bi-house"></i> Trang chủ</a>
                    <a class="btn btn-primary mx-3 ticket-dowload"><i class="bi bi-download"></i> Tải ảnh xuống</a>
                    <a class="btn btn-primary mx-3 ticket-pdf"><i class="bi bi-filetype-pdf"></i> Xuất PDF</a>
                </div>

                <div class="row mb-5">
                    <div class="ticket bg-white p-5" id="ticket">
                        <div class="row d-flex justify-content-between">
                            <div class="col-12 d-flex">
                                <img src="/cafena/images/logo.png" style="width: 60px;" alt="">
                                <span class="ms-2 mt-3"><b>Cafena shop</b></span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="row">Địa chỉ: Số 10, Ngõ 280, Đường Hồ Tùng Mậu, Bắc Từ Liêm, Hà Nội, Việt Nam</span>
                                <span class="row">Số điện thoại: 0912345678</span>
                            </div>
                            <!-- <div class="col-3 d-flex justify-content-center">
                            <span class="me-2"><b>Mã phiếu:</b></span>
                           
                        </div> -->
                        </div>
                        <div class="row p-4 mb-2">
                            <h2 align="center"><b>HÓA ĐƠN THANH TOÁN</b></h2>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3"><b>Tên khách hàng:</b></div>
                            <div class="col-9"><?php echo $row['fullname'] ?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3"><b>Số điện thoại:</b></div>
                            <div class="col-9"><?php echo $row['phone'] ?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3"><b>Email:</b></div>
                            <div class="col-9"><?php echo $row['email'] ?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3"><b>Địa chỉ:</b></div>
                            <div class="col-9"><?php echo $row['diachi'] ?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3 fw-bold mb-2">Chi tiết:</div>
                            <div class="col-12">
                                <table class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        <?php
                                        if (isset($_SESSION['carts'])) {
                                            $i = 0;
                                            $tongtien = 0;
                                            foreach ($_SESSION['carts'] as $cart_item) {
                                                $total = $cart_item['soluong'] * $cart_item['price'];
                                                $tongtien += $total;
                                                $i++;
                                        ?>
                                                <tr>
                                                    <td><?php echo $cart_item['id'] ?></td>
                                                    <td>
                                                        <?php echo $cart_item['tensp'] ?>
                                                    </td>
                                                    <!-- <td>

                                                </td> -->
                                                    <td>
                                                        <span><img src="/cafena/images/<?php echo $cart_item['hinhanh'] ?>" width="60px"></span>
                                                    </td>
                                                    <td>
                                                        <?php echo $cart_item['soluong'] ?>

                                                    </td>
                                                    <td><span><?php echo number_format($cart_item['price'], 0, ',', '.') . ' VNĐ' ?></span></td>

                                                    <td><span><?php echo number_format($total, 0, ',', '.') . ' VNĐ' ?></span></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="5"><span class="d-flex justify-content-end"><b>Tổng:</b></span></td>
                                                <td><span class="d-flex justify-content-end"><b><?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'  ?></b></span></td>
                                            </tr>
                                    </tbody>
                                <?php
                                        } else {
                                ?>
                                    <tr>
                                        <td colspan="6">Không có sản phẩm nào</td>
                                    </tr>
                                <?php
                                        }
                                ?>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 fw-bold">Ghi chú:</div>
                            <div class="col-12"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3"><b>Thanh toán:</b></div>
                            <div class="col-9"></div>
                        </div>
                        <div class="row my-5 d-flex justify-content-between">
                            <div class="col-5">
                                <div class="d-flex justify-content-center mb-2"><b>Nhân viên xác nhận</b></div>
                                <div class="d-flex justify-content-center">Trần Khắc Nam</div>
                            </div>
                            <div class="col-5">
                                <div class="d-flex justify-content-center mb-2"><b>Khách hàng</b></div>
                                <div class="d-flex justify-content-center"><?php echo $row['fullname'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php
    }
    ?>
    
    <script>
        document.querySelector(".ticket-dowload").addEventListener("click", () => {
            const target = document.getElementById("ticket");

            html2canvas(target).then((canvas) => {
                const base64image = canvas.toDataURL("image/png");
                let anchor = document.createElement("a");
                anchor.setAttribute("href", base64image);
                anchor.setAttribute("download", "Hoa_don_mua_hang.png");
                anchor.click();
                anchor.remove();
            });
        });

        document.querySelector(".ticket-pdf").addEventListener("click", () => {
            const target = document.getElementById("ticket");

            var opt = {
                margin: 0.5,
                filename: 'Hoa_don_mua_hang.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    width: 920
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A4',
                    orientation: 'portrait'
                }
            };

            var worker = html2pdf().from(target).set(opt).toPdf().get("pdf").then((pdf) => {
                window.open(pdf.output('bloburl'), '_blank');
            });
        });

        document.querySelector(".btn-goback").addEventListener("click", () => {
            window.history.back();
        });
    </script>
</body>

</html>