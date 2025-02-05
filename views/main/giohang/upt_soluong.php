<?php
    session_start();
    $kn = mysqli_connect("localhost:3806","root","","coffees");
    if(!$kn){
        echo 'Lỗi kết nối';
    }
    //TĂNG SỐ LUONG
    if(isset($_GET['cong'])){
		$id=$_GET['cong'];
        foreach($_SESSION['carts'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]= array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['carts'] =$product;
            }
            else{
                
                if($cart_item['soluong']<=10){
                    $tangsoluong =$cart_item['soluong']+1;
                    $product[]= array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'price'=>$cart_item['price'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             
                }else{
                    $product[]= array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             

                }
                $_SESSION['carts'] =$product;
            }

        }
        header('Location:../../../index.php?quanly=giohang');
	}
    //TRỪ SỐ LƯỢNG
    if(isset($_GET['tru'])){
		$id=$_GET['tru'];
        foreach($_SESSION['carts'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]= array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['carts'] =$product;
            }
            else{
                
                if($cart_item['soluong']>1){
                    $trusoluong =$cart_item['soluong']-1;
                    $product[]= array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$trusoluong,'price'=>$cart_item['price'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             
                }else{
                    $product[]= array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             

                }
                $_SESSION['carts'] =$product;
            }

        }
        header('Location:../../../index.php?quanly=giohang');
	}

?>
