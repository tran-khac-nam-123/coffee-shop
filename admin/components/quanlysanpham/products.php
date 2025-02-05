<?php

    $limit = 10;

    // Trang hiện tại (mặc định là 1)
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1); // Đảm bảo trang >= 1

    // Tính toán offset
    $offset = ($page - 1) * $limit;

    // Đếm tổng số sản phẩm
    $total_products_query = "SELECT COUNT(*) as total FROM tbl_sanpham";
    $result_total = mysqli_query($kn, $total_products_query);
    $total_products = mysqli_fetch_assoc($result_total)['total'];

    // Tính số trang
    $total_pages = ceil($total_products / $limit);

    // Lấy dữ liệu sản phẩm theo trang
    $query = "SELECT * FROM tbl_sanpham LIMIT $limit OFFSET $offset";
    $kq = mysqli_query($kn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div class="mb-5" style="margin-top: 80px; width: 1100px; margin-left: 350px;">
        <div class="pagetitle d-flex justify-content-between">
            <h1>Danh sách</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
                </ol>
            </nav>
        </div>
        <div class="p-3 bg-white">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại thực phẩm</th>
                        <th>Giá</th>
                        <th>Xuất xứ</th>
                        <th>Hạn sử dụng</th>
                        <th>Thực hiện</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($kq)): ?>
                        <tr>
                            <td><?= $row['id_sanpham'] ?></td>
                            <td><?= $row['tensp'] ?></td>
                            <td><?= $row['loaithucpham'] ?></td>
                            <td><?php echo number_format($row['price'], 0, ',', '.'); ?></td>
                            <td><?= $row['xuatxu'] ?></td>
                            <td><?= $row['hansudung'] ?></td>
                            <td>
                                <a class='btn btn-primary text-white' style='font-size: 11px;' href='index.php?action=quanlysanpham&query=xem&id_sp=<?= $row['id_sanpham'] ?>'><i class='fa-regular fa-eye'></i></a>
                                <a class='btn btn-success text-white' style='font-size: 11px;' href='index.php?action=quanlysanpham&query=sua&id_sp=<?= $row['id_sanpham'] ?>'><i class='fa-regular fa-pen-to-square'></i></a>
                                <a onclick="return Delete('<?php echo $row['tensp'] ?>')" class='btn btn-danger text-white' style='font-size: 11px;' href='../actions/xl_product.php?id_sp=<?= $row['id_sanpham'] ?>'><i class='fa-regular fa-trash-can'></i></a></td>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <nav>
                <ul class="pagination justify-content-center">
                    <!-- Nút "Previous" -->
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=quanlysanpham&query=danhsach&page=<?= $page - 1 ?>"><i class="bi bi-arrow-bar-left"></i></a>
                        </li>
                    <?php endif; ?>

                    <!-- Hiển thị số trang -->
                    <?php if ($total_pages > 2): ?>
                        <li class="page-item <?= ($page == 1) ? 'active' : '' ?>">
                            <a class="page-link" href="?action=quanlysanpham&query=danhsach&page=1">1</a>
                        </li>
                        <li class="page-item <?= ($page == 2) ? 'active' : '' ?>">
                            <a class="page-link" href="?action=quanlysanpham&query=danhsach&page=2">2</a>
                        </li>
                        <?php if ($page > 2): ?>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Nếu tổng số trang <= 2 -->
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="?action=quanlysanpham&query=danhsach&page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    <?php endif; ?>

                    <!-- Nút "Next" -->
                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=quanlysanpham&query=danhsach&page=<?= $page + 1 ?>"><i class="bi bi-arrow-bar-right"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>



        </div>
    </div>

    <script>
        function Delete(name){
            return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name +"?");
        }
    </script>
</body>

</html>