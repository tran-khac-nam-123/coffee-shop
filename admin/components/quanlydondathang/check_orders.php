<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between">
        <h1>Thông tin đơn đặt hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="index.php?action=quanlydondathang&query=danhsach">Đơn đặt hàng</a></li>
                <li class="breadcrumb-item active">Thông tin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <?php

        $kn = mysqli_connect("localhost:3806","root","","coffees");
        if(!$kn){
            echo "Lỗi kết nối";
        }

        $sql = "SELECT 
                    o.diachi AS diachi,
                    o.payment AS payment,
                    o.order_date AS order_date,
                    od.soluong AS soluong,
                    od.price AS price,
                    od.total AS total,
                    sp.tensp AS tensp,
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
                    tbl_sanpham AS sp
                ON 
                    od.id_sanpham = sp.id_sanpham
                JOIN 
                    tbl_user AS u
                ON 
                    u.id_user = o.id_user
                where o.id_order = '$_GET[id_or]' LIMIT 1;";
        $kq = mysqli_query($kn, $sql);
        if (!$kq) {
            echo 'Lỗi truy vấn';
        }

        while ($row = mysqli_fetch_array($kq)) {
        ?>
            <div class="row">
                <!-- <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="../images/" alt="Profile">
                            <h2></h2>
                        </div>
                    </div>

                </div> -->

                <div class="col-xl">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Thông tin chi tiết</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Họ và tên</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['fullname'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['email'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['phone'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Địa chỉ nhận hàng</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['diachi'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Tên sản phẩm</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['tensp'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Giá</div>
                                        <div class="col-lg-9 col-md-8"><?php echo number_format($row['price'], 0, ',', '.') ?> VNĐ</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Số lượng</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['soluong'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Ngày đặt</div>
                                        <div class="col-lg-9 col-md-8"><?php echo date('d - m - Y', strtotime($row['order_date'])) ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tổng tiền</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['total'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Trạng thái</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['payment'] ?></div>
                                    </div>

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        <?php
        }
        ?>
    </section>
</main>