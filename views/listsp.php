<div style="clear:both;"></div>

<div class="show_new">
    <?php
    if (isset($_GET['quanly'])) {
        $bientam = $_GET['quanly'];
    } else {
        $bientam = "";
    }
    if ($bientam == "") { ?>

    <?php
        include("main/sanphammoi.php");
    }
    ?>

</div>

<div style="clear:both;"></div>
<div class="show">
    <?php
    if (isset($_GET['quanly'])) {
        $bientam = $_GET['quanly'];
    } else {
        $bientam = "";
    }
    if ($bientam == "") {
    ?>

    <?php
        include("main/sanpham.php");
    }

    ?>

</div>