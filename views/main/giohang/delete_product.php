<?php
    session_start();
    $kn = mysqli_connect("localhost:3806","root","","coffees");
    if(!$kn){
        echo 'Lỗi kết nối';
    }
   
    //XÓA SẢN PHẨM
    if(isset($_SESSION['carts'])&& isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        $id_user = $_SESSION['id_user'];
        foreach($_SESSION['carts'] as $cart_item){
            if($cart_item['id']!=$id){
                //thiết lập lại session 
                $product[]= array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                
            }
        $_SESSION['carts']=$product;

        $sql_get_cart = "SELECT id_cart FROM tbl_cart WHERE id_user='$id_user'";
        $query_get_cart = mysqli_query($kn, $sql_get_cart);

        if ($query_get_cart && mysqli_num_rows($query_get_cart) > 0) {
            $row_cart = mysqli_fetch_assoc($query_get_cart);
            $id_cart = $row_cart['id_cart'];

            // Xóa sản phẩm khỏi bảng tbl_cart_detail
            $sql_delete_detail = "DELETE FROM tbl_cart_detail WHERE id_cart='$id_cart' AND id_sanpham='$id'";
            mysqli_query($kn, $sql_delete_detail);

            // Kiểm tra nếu giỏ hàng không còn sản phẩm nào, xóa giỏ hàng
            $sql_check_cart_detail = "SELECT * FROM tbl_cart_detail WHERE id_cart='$id_cart'";
            $query_check_cart_detail = mysqli_query($kn, $sql_check_cart_detail);

            if (mysqli_num_rows($query_check_cart_detail) == 0) {
                $sql_delete_cart = "DELETE FROM tbl_cart WHERE id_cart='$id_cart'";
                mysqli_query($kn, $sql_delete_cart);
            }
        }
        header('Location:../../../index.php?quanly=giohang');
        }
		
	}

?>


