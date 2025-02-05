<?php
    $limit = 10;

    // Trang hiện tại (mặc định là 1)
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1); // Đảm bảo trang >= 1

    // Tính toán offset
    $offset = ($page - 1) * $limit;

    // Đếm tổng số sản phẩm
    $total_products_query = "SELECT COUNT(*) as total FROM tbl_user";
    $result_total = mysqli_query($kn, $total_products_query);
    $total_products = mysqli_fetch_assoc($result_total)['total'];

    // Tính số trang
    $total_pages = ceil($total_products / $limit);

    // Lấy dữ liệu sản phẩm theo trang
    $query = "SELECT * FROM tbl_user LIMIT $limit OFFSET $offset";
    $kq = mysqli_query($kn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người sử dụng</title>
</head>

<body>
    <div class="mb-5" style="margin-top: 80px; width: 1100px; margin-left: 350px;">
        <div class="pagetitle d-flex justify-content-between">
            <h1>Danh sách</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Người sử dụng</li>
                </ol>
            </nav>
        </div>
        <div class="p-3 bg-white">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên đăng nhập</th>
                        <th>Tên đầy đủ</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Thực hiện</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($kq)): ?>
                        <tr>
                            <td><?= $row['id_user'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['fullname'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td>
                                <a class='btn btn-primary text-white' style='font-size: 11px;' href='index.php?action=quanlynguoidung&query=xem&id=<?= $row['id_user'] ?>'><i class='fa-regular fa-eye'></i></a>
                                <a class='btn btn-success text-white' style='font-size: 11px;' href='index.php?action=quanlynguoidung&query=sua&id=<?= $row['id_user'] ?>'><i class='fa-regular fa-pen-to-square'></i></a>
                                <a onclick="return Delete('<?php echo $row['username'] ?>')" class='btn btn-danger text-white' style='font-size: 11px;' href='../actions/xl_user.php?id=<?= $row['id_user'] ?>'><i class='fa-regular fa-trash-can'></i></a></td>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <nav>
                <ul class="pagination justify-content-center">

                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=quanlynguoidung&query=danhsach&page=<?= $page - 1 ?>"><i class="bi bi-arrow-bar-left"></i></a>
                        </li>
                    <?php endif; ?>

                    <?php if ($total_pages > 2): ?>
                        <li class="page-item <?= ($page == 1) ? 'active' : '' ?>">
                            <a class="page-link" href="?action=quanlynguoidung&query=danhsach&page=1">1</a>
                        </li>
                        <li class="page-item <?= ($page == 2) ? 'active' : '' ?>">
                            <a class="page-link" href="?action=quanlynguoidung&query=danhsach&page=2">2</a>
                        </li>
                        <?php if ($page > 2): ?>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        <?php endif; ?>
                    <?php else: ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="?action=quanlynguoidung&query=danhsach&page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    <?php endif; ?>

                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=quanlynguoidung&query=danhsach&page=<?= $page + 1 ?>"><i class="bi bi-arrow-bar-right"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>

    <script>
        function Delete(name){
            return confirm("Bạn có chắc chắn muốn xóa tài khoản: " + name +"?");
        }
    </script>
</body>

</html>