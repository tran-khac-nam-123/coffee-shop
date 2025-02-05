<?php
header('Content-Type: application/json');

$kn = mysqli_connect("localhost:3806", "root", "", "coffees");
if (!$kn) {
    echo 'Lỗi kết nối';
}

// Lấy tham số từ yêu cầu
$type = $_GET['type'] ?? '';
$interval = $_GET['interval'] ?? '';

$data = [];

if ($type && $interval) {
    if ($type === 'users') {
        if ($interval === 'monthly') {
            $sql = "SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, COUNT(*) AS total FROM tbl_user 
                    GROUP BY YEAR(created_at), MONTH(created_at) 
                    ORDER BY YEAR(created_at), MONTH(created_at)";
        } elseif ($interval === 'yearly') {
            $sql = "SELECT YEAR(created_at) AS year, COUNT(*) AS total FROM tbl_user 
                    GROUP BY YEAR(created_at) 
                    ORDER BY YEAR(created_at)";
        }
    } elseif ($type === 'orders') {
        if ($interval === 'monthly') {
            $sql = "SELECT MONTH(order_date) AS month, YEAR(order_date) AS year, COUNT(*) AS total FROM tbl_order 
                    GROUP BY YEAR(order_date), MONTH(order_date) 
                    ORDER BY YEAR(order_date), MONTH(order_date)";
        } elseif ($interval === 'yearly') {
            $sql = "SELECT YEAR(order_date) AS year, COUNT(*) AS total FROM tbl_order 
                    GROUP BY YEAR(order_date) 
                    ORDER BY YEAR(order_date)";
        }
    }

    if (isset($sql)) {
        $result = $kn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
}

// Trả dữ liệu dưới dạng JSON
echo json_encode($data);

$kn->close();
?>
