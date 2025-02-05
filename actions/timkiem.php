<section class="products" id="products" style="margin-top: 100px;">

	<div class="box-container">
		<?php
		
		if(isset($_POST['timkiem'])){
			$tukhoa = $_POST['tukhoa'];
		}

		// Câu truy vấn
		$sql = "SELECT *
				FROM tbl_sanpham
				WHERE tbl_sanpham.tensp LIKE '%".$tukhoa."%'" ;

		// Thực thi truy vấn
		$result = $kn->query($sql);

		if ($result && $result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
		?>
			<form method="POST" action="views/main/giohang/addtocart.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
				<div class="box">
					<div class="image">
						<a href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham'] ?>" ><img src="images/<?php echo $row['hinhanh'] ?>"></a>
					</div>
					<div class="content">
						<h3><?php echo htmlspecialchars($row['tensp']); ?></h3>
						<div class="price"><?php echo number_format($row['price'], 0, ',', '.') . ' VNĐ'; ?></div>
					</div>
				</div>
			</form>
		<?php
			}
		} else {
			echo "
				<script type='text/javascript'>
					alert('Không tìm thấy sản phẩm nào phù hợp với từ khóa \"$tukhoa\"');
					window.location.href = 'index.php';
				</script>";
		}

		// Đóng kết nối
		$kn->close();
		?>
	</div>

</section>