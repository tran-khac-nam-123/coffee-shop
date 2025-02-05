<?php
$kn = mysqli_connect("localhost:3806", "root", "", "coffees");
if (!$kn) {
    die('Lỗi kết nối');
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
