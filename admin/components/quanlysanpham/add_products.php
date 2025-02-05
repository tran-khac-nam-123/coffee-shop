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
      <h1>Thêm mới sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
          <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
        </ol>
      </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
		        <div class="card">
		            <div class="card-body">
                        <form action="../actions/them_product.php" method="POST" class="needs-validation" novalidate>
                            <div class="mb-3 mt-3 row">
                                <label for="masp" class="col-sm-3 col-form-label fw-bold">Mã sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="masp"
                                        name="masp"
                                        placeholder="Mã sản phẩm"
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
                                        placeholder="Dạng đồ uống"
                                        name="dangdouong"
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
                                        placeholder="Dạng đồ uống"
                                        name="loaithucpham"
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
                                        placeholder="Hạn sử dụng"
                                        name="hansudung"
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
                                        name="mota" require></textarea>
                                    <div class="invalid-feedback">
                                        Hãy nhập mô tả
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-center">
                                <input type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                value="Thêm mới"
                                name="themsanpham"
                                onclick="return Add()"
                                >
                                <input type="reset" class="btn btn-secondary col-md-2 col-sm-3 mt-3" value="Xóa">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function Add(){
            alert("Thêm sản phẩm thành công!");
        }
    </script>
</div>
</body>
</html>