<?php
// Kết nối cơ sở dữ liệu
$kn = mysqli_connect("localhost:3806", "root", "", "coffees");
if (!$kn) {
    echo 'Lỗi kết nối';
}

$sql = "SELECT o.order_date, od.total FROM  tbl_order o JOIN  tbl_order_detail od ON o.id_order = od.id_order WHERE o.payment='Đã thanh toán';";
$result = $kn->query($sql);

$sql_order = "SELECT COUNT(*) AS total_orders FROM tbl_order;";
$result_order = $kn->query($sql_order);

$sql_user = "SELECT COUNT(*) AS total_users FROM tbl_user;";
$result_user = $kn->query($sql_user);

$sql_profit = "SELECT SUM(total) AS total_profit FROM tbl_order_detail JOIN  tbl_order ON tbl_order.id_order = tbl_order_detail.id_order WHERE tbl_order.payment='Đã thanh toán';";
$result_profit = $kn->query($sql_profit);

function getMonth($time){
    $month = date('m', strtotime($time));
    return $month;
}

if($result->num_rows > 0){
    $data = [0,0,0,0,0,0,0,0,0,0,0,0];
    while($row = $result->fetch_assoc()){
        $month = getMonth($row['order_date']);
        if($month == '01'){
            $data[0] += number_format($row['total'] / 25450, 2);
        } elseif ($month == '02'){
            $data[1] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '03'){
            $data[2] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '04'){
            $data[3] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '05'){
            $data[4] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '06'){
            $data[5] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '07'){
            $data[6] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '08'){
            $data[7] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '09'){
            $data[8] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '10'){
            $data[9] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '11'){
            $data[10] += number_format($row['total'] / 25450, 2);
        }
        elseif ($month == '12'){
            $data[11] += number_format($row['total'] / 25450, 2);
        }
    }
}

$text = "";
for($i=0; $i<count($data); $i++){
    $text  = $text.$data[$i].',';
}

$text_data = substr($text,0,-1);
$text_data = "[".$text_data.']';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .circle-wrapper {
            width: 70px;           
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;        
        }
        .circle-wrapper i {
            font-size: 36px;                    
        }
    </style>
</head>
<body>
    <div class="mb-5" style="margin-top: 80px; width: 1100px; margin-left: 350px;">
        <div class="pagetitle d-flex justify-content-between">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/cafena/admin/index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thống kê</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card card-stat p-3">
                            <div class="d-flex">
                                <h6 class="col-10" style="font-size: 22px; margin-bottom: 0; font-weight: 600; color: #012970;">Người dùng</h6>
                                <div class="dropdown ms-3 justify-content-top">
                                    <button class="btn bi bi-three-dots" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Trong ngày</a></li>
                                        <li><a class="dropdown-item" href="#">Trong tháng</a></li>
                                        <li><a class="dropdown-item" href="#">Trong năm</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mt-4">
                                <div class="circle-wrapper bg-warning-subtle">
                                    <i class="bi bi-people text-warning"></i>
                                </div>
                                <span class="ms-3" style="font-size: 32px; font-weight: 600;">
                                    <?php while ($row = mysqli_fetch_assoc($result_user)): ?>
                                        <?= $row['total_users'] ?>
                                    <?php endwhile; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-stat p-3">
                        <div class="d-flex">
                                <h6 class="col-10" style="font-size: 22px; margin-bottom: 0; font-weight: 600; color: #012970;">Đơn đặt hàng</h6>
                                <div class="dropdown ms-3">
                                    <button class="btn bi bi-three-dots" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Trong ngày</a></li>
                                        <li><a class="dropdown-item" href="#">Trong tháng</a></li>
                                        <li><a class="dropdown-item" href="#">Trong năm</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mt-4">
                                <div class="circle-wrapper bg-primary-subtle">
                                    <i class="bi bi-journal-text text-primary"></i>
                                </div>
                                <span class="ms-3" style="font-size: 32px; font-weight: 600;">
                                    <?php while ($row = mysqli_fetch_assoc($result_order)): ?>
                                        <?= $row['total_orders'] ?>
                                    <?php endwhile; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-stat p-3">
                        <div class="d-flex">
                                <h6 class="col-10" style="font-size: 22px; margin-bottom: 0; font-weight: 600; color: #012970;">Lợi nhuận</h6>
                                <div class="dropdown ms-3">
                                    <button class="btn bi bi-three-dots" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Trong ngày</a></li>
                                        <li><a class="dropdown-item" href="#">Trong tháng</a></li>
                                        <li><a class="dropdown-item" href="#">Trong năm</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mt-4">
                                <div class="circle-wrapper bg-body-secondary">
                                    <i class="bi bi-currency-dollar text-success"></i>
                                </div>
                                <span class="ms-3" style="font-size: 32px; font-weight: 600;">
                                    <?php while ($row = mysqli_fetch_assoc($result_profit)): ?>
                                        <?= number_format($row['total_profit'] / 25450, 2) ?>
                                    <?php endwhile; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row p-3">
                    <div class="col-md-12 bg-white">
                        <h1 class="m-3" style="font-size: 24px; margin-bottom: 0; font-weight: 600; color: #012970;">
                            Biểu đồ lợi nhuận <span style="color: rgba(1, 41, 112, 0.6); font-size: 20px;"> Trong năm 2024</span>
                        </h1>
                        <div class="chart-container mt-2">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Dữ liệu biểu đồ
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Dollars',
                    data: <?php echo $text_data ?>,
                    backgroundColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(153,102,255,1)',
                        'rgba(255,159,64,1)',
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(153,102,255,1)',
                        'rgba(255,159,64,1)',
                    ],
                    
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

