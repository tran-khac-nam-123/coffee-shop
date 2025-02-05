<?php
$kn = mysqli_connect("localhost:3806", "root", "", "coffees");
if (!$kn) {
    die('Lỗi kết nối: ' . mysqli_connect_error());
}

$id_order = $_GET['id_or'] ?? null;
if (!$id_order) {
    die('Thiếu id_order');
}

if (isset($_POST['suadonhang'])) {
    $fullname = $_POST['fullname'] ?? '';
    $payment = $_POST['payment'] ?? '';
    $email = $_POST['email'] ?? '';
    $diachi = $_POST['diachi'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $soluong = $_POST['soluong'] ?? '';
    $total = $_POST['total'] ?? '';

    // Sử dụng transaction để đảm bảo dữ liệu nhất quán
    mysqli_begin_transaction($kn);

    try {
        // Cập nhật bảng tbl_order
        $sql1 = "UPDATE tbl_order SET diachi = '$diachi', payment = '$payment' WHERE id_order = '$id_order';";
        mysqli_query($kn, $sql1);

        // Cập nhật bảng tbl_order_detail
        $sql2 = "UPDATE tbl_order_detail SET soluong = '$soluong', total = '$total' WHERE id_order = '$id_order';";
        mysqli_query($kn, $sql2);

        // Cập nhật bảng tbl_user
        $sql3 = "UPDATE tbl_user 
                SET fullname = '$fullname', phone = '$phone', email = '$email' 
                WHERE id_user = (SELECT id_user FROM tbl_order WHERE id_order = '$id_order');";
        mysqli_query($kn, $sql3);

        // Xác nhận transaction
        mysqli_commit($kn);
        header('Location: ../admin/index.php?action=quanlydondathang&query=danhsach');
    } catch (Exception $e) {
        mysqli_rollback($kn); // Hoàn tác nếu có lỗi
        die("Lỗi khi cập nhật dữ liệu: " . $e->getMessage());
    }
} else {
    // Xóa đơn hàng nếu không nhấn nút sửa
    $sql_xoa = "DELETE FROM tbl_order WHERE id_order = '$id_order';";

    if (mysqli_query($kn, $sql_xoa)) {
        header('Location: ../admin/index.php?action=quanlydondathang&query=danhsach');
    } else {
        echo "Lỗi khi xóa dữ liệu: " . mysqli_error($kn);
    }
}
?>
