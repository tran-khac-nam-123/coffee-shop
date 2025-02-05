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
      <h1>Cập nhật sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
          <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
        </ol>
      </nav>
    </div>
    <?php

    $sql = "select * from tbl_sanpham where id_sanpham = '$_GET[id_sp]' LIMIT 1";
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
                        <form action="../actions/xl_product.php?id_sp=<?php echo $row['id_sanpham'] ?>" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                            <div class="mb-3 mt-3 row">
                                <label for="masp" class="col-sm-3 col-form-label fw-bold">Mã sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="masp"
                                        name="masp"
                                        placeholder="Mã sản phẩm"
                                        value="<?= $row['masp'] ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập mã sản phẩm
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tensp" class="col-sm-3 col-form-label fw-bold">Tên sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="tensp"
                                        name="tensp"
                                        placeholder="Tên sản phẩm"
                                        value="<?= $row['tensp'] ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập tên sản phẩm
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hinhanh" class="col-sm-3 col-form-label fw-bold">Hình ảnh</label>
                                <div class="col-sm-9">
                                    <input type="file"
                                        class="form-control"
                                        id="hinhanh"
                                        value="<?= $row['hinhanh'] ?>"
                                        name="hinhanh">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="price" class="col-sm-3 col-form-label fw-bold">Giá sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="price"
                                        name="price"
                                        placeholder="Giá sản phẩm"
                                        value="<?= $row['price'] ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập giá sản phẩm
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="xuatxu" class="col-sm-3 col-form-label fw-bold">Xuất xứ</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="xuatxu"
                                        name="xuatxu"
                                        placeholder="Xuất xứ"
                                        value="<?= $row['xuatxu'] ?>"
                                        require>
                                    <div class="invalid-feedback">
                                        Hãy nhập xuất xứ
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="dangdouong" class="col-sm-3 col-form-label fw-bold">Dạng đồ uống</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="dangdouong"
                                        name="dangdouong"
                                        placeholder="Dạng đồ uống"
                                        value="<?= $row['dangdouong'] ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập dạng đồ uống
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="loaithucpham" class="col-sm-3 col-form-label fw-bold">Loại thực phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="loaithucpham"
                                        name="loaithucpham"
                                        placeholder="Loại thực phẩm"
                                        value="<?= $row['loaithucpham'] ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập loại thực phẩm
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hansudung" class="col-sm-3 col-form-label fw-bold">Hạn sử dụng</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="hansudung"
                                        name="hansudung"
                                        placeholder="Hạn sử dụng"
                                        value="<?= $row['hansudung'] ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập hạn sử dụng
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
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập số lượng
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="mota" class="col-sm-3 col-form-label fw-bold">Mô tả</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        style="height: 100px;"
                                        class="form-control"
                                        id="mota"
                                        name="mota"
                                        require><?= $row['mota'] ?></textarea>
                                    <div class="invalid-feedback">
                                        Hãy nhập mô tả
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-center">
                                <input type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                value="Cập nhật"
                                name="suasanpham"
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
            alert("Cập nhật sản phẩm thành công!");
        }
        function updateFileName() {
            var fileInput = document.getElementById('hinhanh');
            var fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Chưa chọn tệp';
            document.getElementById('file-name').textContent = fileName;
        }
    </script>
</div>
</body>
</html>