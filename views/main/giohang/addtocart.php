<?php
    session_start();
    $kn = mysqli_connect("localhost:3806","root","","coffees");
    if(!$kn){
        echo 'Lỗi kết nối';
    }

	//xóa sản phẩm 
	if(isset($_SESSION['carts'])){
		
	}

    
    //them 
    if (isset($_POST['themgiohang']) && isset($_POST['soluong'])) {
    $soluongsp = $_POST['soluong'];
    $soluong = (int)$soluongsp;
    $id_sanpham = $_GET['idsanpham'];

    // Lấy thông tin sản phẩm từ bảng tbl_sanpham
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id_sanpham' LIMIT 1";
    $query = mysqli_query($kn, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $price = $row['price'];
        $total = $soluong * $price;

        // Tạo sản phẩm mới để thêm vào session
        $new_product = array(array(
            'tensp' => $row['tensp'],
            'id' => $id_sanpham,
            'soluong' => $soluong,
            'price' => $price,
            'hinhanh' => $row['hinhanh'],
            'masp' => $row['masp'],
            'total' => $total
        ));

        // Kiểm tra session giỏ hàng
        if (isset($_SESSION['carts'])) {
            $found = false;
            foreach ($_SESSION['carts'] as $cart_item) {
                if ($cart_item['id'] == $id_sanpham) {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $soluong,
                        'price' => $cart_item['price'],
                        'hinhanh' => $cart_item['hinhanh'],
                        'masp' => $cart_item['masp'],
                        'total' => $soluong * $cart_item['price']
                    );
                    $found = true;
                } else {
                    $product[] = $cart_item;
                }
            }
            if (!$found) {
                $_SESSION['carts'] = array_merge($product, $new_product);
            } else {
                $_SESSION['carts'] = $product;
            }
        } else {
            $_SESSION['carts'] = $new_product;
        }

        // Lưu dữ liệu vào bảng tbl_cart
        $id_user = $_SESSION['id_user']; // ID người dùng từ session
        $created_at = date('Y-m-d H:i:s');

        // Kiểm tra nếu giỏ hàng của người dùng đã tồn tại
        $sql_check_cart = "SELECT id_cart FROM tbl_cart WHERE id_user='$id_user'";
        $query_check_cart = mysqli_query($kn, $sql_check_cart);

        if (mysqli_num_rows($query_check_cart) == 0) {
            // Nếu giỏ hàng chưa tồn tại, tạo giỏ hàng mới
            $sql_cart = "INSERT INTO tbl_cart (id_user, created_at) VALUES ('$id_user', '$created_at')";
            mysqli_query($kn, $sql_cart);
            $id_cart = mysqli_insert_id($kn); // Lấy ID giỏ hàng vừa tạo
            $_SESSION['id_cart'] = $id_cart;
        } else {
            // Nếu giỏ hàng đã tồn tại, lấy ID giỏ hàng
            $row_cart = mysqli_fetch_array($query_check_cart);
            $id_cart = $row_cart['id_cart'];
            $_SESSION['id_cart'] = $id_cart;
        }

        // Lưu dữ liệu vào bảng tbl_cart_detail
        $sql_cart_detail = "INSERT INTO tbl_cart_detail (id_cart, id_sanpham, soluong, price, total) 
                            VALUES ('$id_cart', '$id_sanpham', '$soluong', '$price', '$total')";
        mysqli_query($kn, $sql_cart_detail);
    }

    header('Location:../../../index.php?quanly=giohang');
}

?>