<?php
$kn = mysqli_connect("localhost:3806", "root", "", "coffees");

if (!$kn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

if (isset($_POST['dathang'])) {
    $diachi = $_POST['diachi'];
    $payment = $_POST['payment'];
    session_start();
    $id_user = $_SESSION['id_user'];
    $id_cart = $_SESSION['id_cart'];
    $tongtien = 0;

    $sql_order = "INSERT INTO tbl_order (id_user, id_cart, diachi, payment) VALUES ('$id_user', '$id_cart', '$diachi', 'Chưa thanh toán')";
    $query_order = mysqli_query($kn, $sql_order);

    if ($query_order) {
        $id_order = mysqli_insert_id($kn);

        foreach ($_SESSION['carts'] as $cart_item) {
            $id_sanpham = $cart_item['id'];
            $soluong = $cart_item['soluong'];
            $price = $cart_item['price'];
            $total = $soluong * $price;
            $tongtien += $total;

            $sql_order_detail = "INSERT INTO tbl_order_detail (id_order, id_sanpham, soluong, price, total) VALUES ('$id_order', '$id_sanpham', '$soluong', '$price', '$total')";
            mysqli_query($kn, $sql_order_detail);
        }

        // unset($_SESSION['carts']);

        // Update payment status based on selected payment method
        if ($payment == 'MOMO' || $payment == 'VNPAY') {
            $update_payment_status = "UPDATE tbl_order SET payment='Đã thanh toán' WHERE id_order='$id_order'";
            mysqli_query($kn, $update_payment_status);

            if ($payment == 'MOMO') {
                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                $partnerCode = "MOMO";
                $accessKey = "F8BBA842ECF85";
                $secretKey = "K951B6PE1waDMi640xX08PD3vg6EkVlz";
                $orderId = time() . "";
                $orderInfo = "Thanh toán qua MOMO";
                $redirectUrl = "http://localhost:8088/cafena/views/main/thanhtoan/hoadon.php";
                $ipnUrl = "http://localhost:8088/cafena/views/main/thanhtoan/hoadon.php";
                $amount = $tongtien;
                $extraData = "";

                $requestId = time() . "";
                $requestType = "payWithMethod"; //captureMoMoWallet

                // Tạo chữ ký bảo mật
                $rawHash = "accessKey=$accessKey&amount=$amount&extraData=$extraData&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=$requestId&requestType=$requestType";
                $signature = hash_hmac("sha256", $rawHash, $secretKey);

                $data = array(
                    'partnerCode' => $partnerCode,
                    'accessKey' => $accessKey,
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature
                );

                $data_string = json_encode($data);

                // Gửi yêu cầu đến MOMO
                $ch = curl_init($endpoint);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string)
                ));

                $result = curl_exec($ch);
                $response = json_decode($result, true);

                // Kiểm tra phản hồi từ MOMO
                if (isset($response['payUrl'])) {
                    header('Location: ' . $response['payUrl']);
                    exit();
                } else {
                    echo "<script>alert('Không thể kết nối đến cổng thanh toán MOMO. Vui lòng thử lại sau.'); window.location.href='/cafena/index.php';</script>";
                }
                unset($_SESSION['carts']);
            } elseif ($payment == 'VNPAY') {
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost:8088/cafena/views/main/thanhtoan/hoadon.php";
                $vnp_TmnCode = "9HZKBNNN"; // Your VNPAY merchant code
                $vnp_HashSecret = "8HGHV2MT8QI5NLICKG28HOBLJ0AATIE6"; // Your VNPAY secret key

                $vnp_TxnRef = rand(1000000, 9999999); // Transaction reference number
                $vnp_OrderInfo = 'Noi dung thanh toan'; // Order description
                $vnp_OrderType = 'billpayment'; // Payment type
                $vnp_Amount = $tongtien * 100; // Amount in VND (multiply by 100 to convert to cents)
                $vnp_Locale = 'vn'; // Locale (Vietnam)
                $vnp_BankCode = 'NCB'; // Optional, specify bank code if needed
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; // Client's IP address

                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }

                // Sort and build the query string
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); 
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }

                // Redirect to VNPAY payment page
                header('Location: ' . $vnp_Url);
                die();
                unset($_SESSION['carts']);
            }
            
        } else {
            $update_payment_status = "UPDATE tbl_order SET payment='Chưa thanh toán' WHERE id_order='$id_order'";
            if(mysqli_query($kn, $update_payment_status)){
                header("Location: /cafena/views/main/thanhtoan/hoadon.php");
            }
            
            unset($_SESSION['carts']);
        }
    } else {
        echo "<script>alert('Đặt hàng thất bại, vui lòng thử lại.');</script>";
    }
}
?>
