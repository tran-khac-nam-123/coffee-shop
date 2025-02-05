<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="mb-4" style="margin-top: 80px; width: 1100px; margin-left: 350px;">
    <!-- <h4 class="mb-3 fw-semibold">Thêm mới người dùng</h4> -->
    <div class="pagetitle d-flex justify-content-between">
      <h1>Cập nhật đơn đặt hàng</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
          <li class="breadcrumb-item active">Cập nhật đơn đặt hàng</li>
        </ol>
      </nav>
    </div>
    <?php

    $sql = "SELECT 
                    o.id_order AS id_order,
                    o.diachi AS diachi,
                    o.payment AS payment,
                    od.soluong AS soluong,
                    od.price AS price,
                    od.total AS total,
                    u.fullname AS fullname,
                    u.email AS email,
                    u.phone AS phone
                FROM 
                    tbl_order AS o
                JOIN 
                    tbl_order_detail AS od
                ON 
                    o.id_order = od.id_order
                JOIN 
                    tbl_user AS u
                ON 
                    u.id_user = o.id_user
                where o.id_order = '$_GET[id_or]' LIMIT 1;";

    $kq = mysqli_query($kn, $sql);
    if (!$kq) {
        echo 'Lỗi truy vấn';
    }

    $statuses = ['Đã thanh toán', 'Chưa thanh toán'];

    while ($row = mysqli_fetch_array($kq)) {
    ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
		        <div class="card">
		            <div class="card-body">
                        <form action="../actions/xl_orders.php?id_or=<?php echo $row['id_order'] ?>" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                            <div class="mb-3 mt-3 row">
                                <label for="fullname" class="col-sm-3 col-form-label fw-bold">Tên đầy đủ</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="fullname"
                                        name="fullname"
                                        placeholder="Họ và tên"
                                        value="<?= $row['fullname'] ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập họ và tên
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label fw-bold">Email</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        placeholder="Email"
                                        value="<?= $row['email'] ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập email
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="diachi" class="col-sm-3 col-form-label fw-bold">Địa chỉ nhận hàng</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="diachi"
                                        placeholder="Địa chỉ nhận hàng"
                                        value="<?= $row['diachi'] ?>"
                                        name="diachi">
                                </div>
                                <div class="invalid-feedback">
                                        Hãy nhập địa chỉ
                                    </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label fw-bold">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="phone"
                                        name="phone"
                                        placeholder="Số điện thoại"
                                        value="<?= $row['phone'] ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập số điện thoại
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="soluong" class="col-sm-3 col-form-label fw-bold">Số lượng</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="soluong"
                                        placeholder="Số lượng"
                                        name="soluong"
                                        value="<?= $row['soluong'] ?>"
                                        oninput="updateTotal()"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập số lượng
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="total" class="col-sm-3 col-form-label fw-bold">Tổng tiền</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="total"
                                        name="total"
                                        value="<?= $row['price'] * $row['soluong'] ?>"
                                        readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="payment" class="col-sm-3 col-form-label fw-bold">Trạng thái</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="payment" id="payment">
                                    <?php foreach ($statuses as $status): ?>
                                        <option value="<?= $status ?>" <?= $status == $row['payment'] ? 'selected' : '' ?>>
                                            <?= $status ?>
                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-center">
                                <input type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                value="Cập nhật"
                                name="suadonhang"
                                onclick="return Update()">
                                <input type="reset" class="btn btn-secondary col-md-2 col-sm-3 mt-3" value="Xóa">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    ?>
    <script>
        const price = <?= $row['price'] ?>;

        function updateTotal() {
            const quantityInput = document.getElementById('soluong');
            const totalInput = document.getElementById('total');

            const quantity = parseInt(quantityInput.value) || 0;
            const total = quantity * price;

            totalInput.value = total;
        }

        function Update(){
            alert("Cập nhật đơn đặt hàng thành công!");
        }
    </script>
</div>
</body>
</html>