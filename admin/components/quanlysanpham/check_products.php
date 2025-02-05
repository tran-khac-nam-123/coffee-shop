<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between">
        <h1>Thông tin sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="index.php?action=quanlynguoidung&query=danhsach">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Thông tin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <?php

        $sql = "select * from tbl_sanpham where tbl_sanpham.id_sanpham = '$_GET[id_sp]' LIMIT 1";
        $kq = mysqli_query($kn, $sql);
        if (!$kq) {
            echo 'Lỗi truy vấn';
        }

        while ($row = mysqli_fetch_array($kq)) {
        ?>
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="../images/<?php echo $row['hinhanh'] ?>" alt="Profile">
                            <h2><?php echo $row['tensp'] ?></h2>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Chi tiết</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Tên sản phẩm</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['tensp'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Giá</div>
                                        <div class="col-lg-9 col-md-8"><?php echo number_format($row['price'], 0, ',', '.') ?> VNĐ</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Xuất xứ</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['xuatxu'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Dạng đồ uống</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['dangdouong'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Loại thực phẩm</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['loaithucpham'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Hạn sử dụng</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['hansudung'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Số lượng</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['soluong'] ?></div>
                                    </div>

                                    <div class="row" style="white-space: pre-wrap; line-height: 2.0; text-transform: none;">
                                        <div class="col-lg-3 col-md-4 label">Mô tả</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['mota'] ?></div>
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