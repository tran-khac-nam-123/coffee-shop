<?php
$kn = mysqli_connect("localhost:3806", "root", "", "coffees");
if (!$kn) {
    echo 'Lỗi kết nối';
}

    $limit = 10;

    // Trang hiện tại (mặc định là 1)
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1); // Đảm bảo trang >= 1

    // Tính toán offset
    $offset = ($page - 1) * $limit;

    // Đếm tổng số sản phẩm
    $total_products_query = "SELECT COUNT(*) as total FROM tbl_order";
    $result_total = mysqli_query($kn, $total_products_query);
    $total_products = mysqli_fetch_assoc($result_total)['total'];

    // Tính số trang
    $total_pages = ceil($total_products / $limit);

    // Lấy dữ liệu sản phẩm theo trang
    $query = "SELECT * FROM tbl_contact LIMIT $limit OFFSET $offset";
    $kq = mysqli_query($kn, $query);

if (!$kq) {
    echo 'Lỗi truy vấn';
    exit();
}

if (isset($_POST['id_contact'])) {
    $id_contact = intval($_POST['id_contact']);
    $sql = "UPDATE tbl_contact SET status = 'Đã xem' WHERE id_contact = $id_contact";
    if (mysqli_query($kn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách</title>
</head>

<body>
    <div class="mb-5" style="margin-top: 56px; width: 1100px; margin-left: 350px;">
        <div class="pagetitle d-flex justify-content-between">
            <h1>Danh sách</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Phản hồi của khách hàng</li>
                </ol>
            </nav>
        </div>
        <div class="p-3 bg-white">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Tiêu đề</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Thực hiện</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($kq)): ?>
                        <tr>
                            <td><?= $row['id_contact'] ?></td>
                            <td><?= $row['fullname'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['created_at'])) ?></td>
                            <td><?= $row['status'] ?></td>
                            <td>
                                <a class="btn btn-primary text-white" style='font-size: 11px;' 
                                   data-bs-toggle="modal" 
                                   data-bs-target="#contactModal<?= $row['id_contact'] ?>"
                                   onclick="markAsViewed(<?= $row['id_contact'] ?>)"> 
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a class="btn btn-danger text-white" 
                                   style='font-size: 11px;' 
                                   href="../actions/xoa_phanhoi.php?id_contact=<?= $row['id_contact'] ?>" 
                                   onclick="return Delete('<?= $row['title'] ?>')">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="contactModal<?= $row['id_contact'] ?>" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="contactModalLabel">Thông tin phản hồi</h5>
                                        <a href="" class="btn-close" aria-label="Close"></a>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Họ tên:</strong> <br> <?= $row['fullname'] ?></p>
                                        <p><strong>Email:</strong> <br> <?= $row['email'] ?></p>
                                        <p><strong>Tiêu đề:</strong> <br> <?= $row['title'] ?></p>
                                        <p><strong>Ngày tạo:</strong> <br> <?php echo date('d-m-Y', strtotime($row['created_at'])) ?></p>
                                        <p><strong>Nội dung:</strong> <br> <?= $row['message'] ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="" class="btn btn-secondary">Đóng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <nav>
                <ul class="pagination justify-content-center">

                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=quanlyphanhoi&query=danhsach&page=<?= $page - 1 ?>"><i class="bi bi-arrow-bar-left"></i></a>
                        </li>
                    <?php endif; ?>

                    <?php if ($total_pages > 2): ?>
                        <li class="page-item <?= ($page == 1) ? 'active' : '' ?>">
                            <a class="page-link" href="?action=quanlyphanhoi&query=danhsach&page=1">1</a>
                        </li>
                        <li class="page-item <?= ($page == 2) ? 'active' : '' ?>">
                            <a class="page-link" href="?action=quanlyphanhoi&query=danhsach&page=2">2</a>
                        </li>
                        <?php if ($page > 2): ?>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        <?php endif; ?>
                    <?php else: ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="?action=quanlyphanhoi&query=danhsach&page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    <?php endif; ?>

                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=quanlyphanhoi&query=danhsach&page=<?= $page + 1 ?>"><i class="bi bi-arrow-bar-right"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
    <script>
        function Delete(name){
            return confirm("Bạn có chắc chắn muốn xóa phản hồi: " + name +"?");
        }
        function markAsViewed(id_contact) {
        fetch("/cafena/actions/xem_phanhoi.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id_contact=" + id_contact,
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "success") {
                console.log("Trạng thái đã được cập nhật thành 'Đã xem'");
            } else {
                console.error("Cập nhật trạng thái thất bại:", data);
            }
        })
        .catch(error => console.error("Lỗi:", error));
    }
    </script>
</body>

</html>