<div class="clear"></div>
<div class="main">
    <?php

        if (isset($_GET['action']) && $_GET['query']) {
            $bientam = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $bientam = '';
            $query = '';
        }
        
        if ($bientam == 'quanlynguoidung' && $query == 'danhsach') {
            include("components/quanlynguoidung/user.php");
        } 
        elseif ($bientam == 'quanlynguoidung' && $query == 'them') {
            include("components/quanlynguoidung/add_user.php");
        }
        elseif ($bientam == 'quanlynguoidung' && $query == 'xem') {
            include("components/quanlynguoidung/check_info.php");
        }
        elseif ($bientam == 'quanlynguoidung' && $query == 'sua') {
            include("components/quanlynguoidung/update_user.php");
        } 
        elseif ($bientam == 'quanlyphanhoi' && $query == 'danhsach') {
            include("components/quanlyphanhoi/ds_contact.php");
        } 
        elseif ($bientam == 'quanlysanpham' && $query == 'danhsach') {
            include("components/quanlysanpham/products.php");
        }
        elseif ($bientam == 'quanlysanpham' && $query == 'them') {
            include("components/quanlysanpham/add_products.php");
        }
        elseif ($bientam == 'quanlysanpham' && $query == 'xem') {
            include("components/quanlysanpham/check_products.php");
        }  
        elseif ($bientam == 'quanlysanpham' && $query == 'sua') {
            include("components/quanlysanpham/update_products.php");
        } 
        elseif ($bientam == 'quanlydondathang' && $query == 'danhsach') {
            include("components/quanlydondathang/orders.php");
        }
        elseif ($bientam == 'quanlydondathang' && $query == 'xem') {
            include("components/quanlydondathang/check_orders.php");
        }
        elseif ($bientam == 'quanlydondathang' && $query == 'sua') {
            include("components/quanlydondathang/update_orders.php");
        }
        elseif ($bientam == 'dashboard' && $query == 'thongke') {
            include("components/dashboard/thongke.php");
        }
        elseif ($bientam == 'dangxuat') {
            include("../login.php");
        } 
        else {
            
        }
    ?>
</div>