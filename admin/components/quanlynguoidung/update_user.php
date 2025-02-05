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
      <h1>Cập nhật người dùng</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
          <li class="breadcrumb-item active">Người sử dụng</li>
        </ol>
      </nav>
    </div>
    <?php

    $sql = "select * from tbl_user where id_user = '$_GET[id]' LIMIT 1";
    $kq = mysqli_query($kn, $sql);
    if (!$kq) {
        echo 'Lỗi truy vấn';
    }

    while ($row = mysqli_fetch_array($kq)) {
    ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
		        <div class="card">
		            <div class="card-body">
                        <form action="../actions/xl_user.php?id=<?php echo $row['id_user'] ?>" method="POST" class="needs-validation" novalidate>
                            <div class="mb-3 mt-3 row">
                                <label for="fullname" class="col-sm-3 col-form-label fw-bold">Tên đầy đủ</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="fullname"
                                        name="fullname"
                                        placeholder="Họ và tên"
                                        value="<?php echo $row['fullname'] ;?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập họ và tên
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-3 col-form-label fw-bold">Tên đăng nhập</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="username"
                                        name="username"
                                        placeholder="Tên đăng nhập"
                                        required
                                        value="<?php echo $row['username'] ;?>"
                                        >
                                    <div class="invalid-feedback">
                                        Hãy nhập tên đăng nhập
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
                                        placeholder="example@gmail.com"
                                        value="<?php echo $row['email'] ;?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập email
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label fw-bold">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="phone"
                                        name="phone"
                                        placeholder="0123 456 789"
                                        value="<?php echo $row['phone'] ;?>">
                                </div>
                            </div>
                            
                            <div class="mb-3 row d-flex justify-content-center">
                                <input type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                value="Cập nhật"
                                name="suanguoidung"
                                onclick="return Update()"
                                >
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
        function Update(){
            alert("Cập nhật người sử dụng thành công!");
        }
    </script>
</div>
</body>
</html>