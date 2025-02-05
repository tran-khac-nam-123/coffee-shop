<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between">
        <h1>Thông tin người sử dụng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="index.php?action=quanlynguoidung&query=danhsach">Người sử dụng</a></li>
                <li class="breadcrumb-item active">Thông tin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <?php

        $sql = "select * from tbl_user where tbl_user.id_user = '$_GET[id]' LIMIT 1";
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

                            <img src="../images/user-profile.jpg" alt="Profile" class="rounded-circle">
                            <h2><?php echo $row['username'] ?></h2>
                            <h3><?php echo $row['fullname'] ?></h3>
                            <div class="social-links mt-2">
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active"
                                        data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Tổng quan</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link"
                                        data-bs-toggle="tab"
                                        data-bs-target="#profile-edit">Chỉnh sửa</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Chi tiết</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tên đầy đủ</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['fullname'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tên đăng nhập</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['username'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['email'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $row['phone'] ?></div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form action="" method="post" class="needs-validation" novalidate>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Tên đầy đủ</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="txtFullname"
                                                    type="text"
                                                    class="form-control"
                                                    id="fullName"
                                                    value="<?php echo $row['fullname'] ?>"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="emailInput" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="txtEmail"
                                                    type="text"
                                                    class="form-control"
                                                    id="emailInput"
                                                    value="<?php echo $row['email'] ?>"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="txtPhone"
                                                    type="text"
                                                    class="form-control"
                                                    id="Phone" value="<?php echo $row['phone'] ?>">
                                            </div>
                                        </div>
                                        <div class="text-center">

                                            <button type="submit" class="btn btn-primary" name="edit">Lưu thay đổi</button>

                                        </div>
                                    </form><!-- End Profile Edit Form -->

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