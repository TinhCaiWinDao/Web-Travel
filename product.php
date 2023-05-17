<?php
session_start();
ob_start();
include 'admin/conec.php';
global $conn;
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = '';
}

if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
	include 'parts/navchitietlg.php';
} else {
	include 'parts/navchitiet.php';
}
?>

<div class="container-2">
	<div class="row no-gutters slider-text-2 align-items-end justify-content-center" style="padding-top: 20px;">
		<div class="col-md-9 pb-5">
			<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Đặt vé <i class="fa fa-chevron-right"></i>
				</span> <span>Chi tiết vé</span>
			</p>
		</div>
	</div>
</div>

<section class="ftco-section-2">
	<div class="container">
		<?php
		$sql_chitiet = "SELECT * FROM `sanpham` INNER JOIN `price_limit` ON `sanpham`.`price_id` = `price_limit`.`price_id` WHERE `sp_id` = '$id';";
		$rs_spchitiet = mysqli_query($conn, $sql_chitiet);
		while ($row_chitiet_sp = mysqli_fetch_array($rs_spchitiet)) {

		?>
			<div class="row">
				<div class="col-md-7 ftco-animate fadeInUp ftco-animated">
					<div class="project-wrap">
						<img class="img-2" src="images/<?php echo $row_chitiet_sp['sp_img'] ?>" alt="">
					</div>
				</div>
				<div class="col-md-5 ftco-animate fadeInUp ftco-animated">
					<div class="project-wrap">
						<div class="text p-4">
							<h3><?php echo $row_chitiet_sp['sp_name'] ?></h3>
							<p class="location"><span class="fa fa-map-marker"></span><?php echo $row_chitiet_sp['sp_address'] ?></p>
							<h3><?php echo number_format($row_chitiet_sp['sp_gia'], 0, ',', '.') . ' VNĐ' ?></h3>

							<span class="days"><?php echo 'Tour ' . $row_chitiet_sp['sp_date'] . ' ngày' ?></span>
							<ul>
								<li><span class="flaticon-shower"></span><?php echo $row_chitiet_sp['sp_shower'] ?></li>
								<li><span class="flaticon-king-size"></span><?php echo $row_chitiet_sp['sp_king'] ?></li>
								<li><span class="flaticon-mountains"></span><?php echo $row_chitiet_sp['sp_sun_umbrella'] ?></li>
							</ul>

							<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
								<input type="hidden" name="idtour" value="<?php echo $id ?>">
								<input type="hidden" name="idprice" value="<?php echo $row_chitiet_sp['price_id'] ?>">
								<input type="hidden" name="tourimg" value="<?php echo $row_chitiet_sp['sp_img'] ?>">
								<input type="hidden" name="tourname" value="<?php echo $row_chitiet_sp['sp_name'] ?>">
								<input type="hidden" name="tourprice" value="<?php echo $row_chitiet_sp['sp_gia'] ?>">
								Số lượng: <input style="width: 50px; border:none" type="number" name="touramount" id="" value="1">
								<input type="hidden" name="tourcon" id="tourcon" value="<?php echo $row_chitiet_sp['sp_con'] ?>">
								<br>
								<br>
								<p><a href="form.php?id=<?php echo $row_chitiet_sp['sp_id'] ?>" class="btn btn-primary py-3 px-4">Đặt ngay</a></p>
								<input class="btn btn-primary py-3 px-4" name="addtocart" type="submit" value="Thêm vào giỏ hàng">
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</section>

<section class="ftco-section-2">
	<div class="container">
		<div class="project-content">
			<div class="text p-4">
				<h4>Giá bao gồm:</h4>
				<ul>
					<li>Vé máy bay khứ hồi theo chương trình tour. (Bao gồm 7kg hành lý xách tay và 20kg hành lý kí gửi. Không bao gồm bữa ăn trên máy bay nếu Qúy khách có nhu cầu vui lòng đóng thêm 300.000vnđ/khách/khứ hồi).</li>
					<li>Thuế hàng không gồm : thuế phi trường 2 nước, phí an ninh, phụ thu phí xăng dầu, bảo hiểm hàng không…</li>
					<li>Khách sạn tiêu chuẩn 3* như chương trình (02 Người lớn/1 Phòng đôi). Bố trí phòng ba khi cần thiết (01 giường lớn + 01 extra bed). Một số khách sạn tham khảo: Seoul – Youngdong Hotel, Yoido Hotel, Kobos Hotel, Benhur Hotel, Centro Hotel hoặc tương đương; Jeju – Jeju Pearl Hotel, Jeju Hawaii Hotel, Parside Hotel hoặc tương đương.</li>
					<li>Phương tiện vận chuyển theo chương trình.</li>
					<li><span>Chi phí ăn uống theo chương trình.</span></li>
					<li>Phí vào cổng các điểm tham quan theo chương trình.</li>
					<li>Bảo hiểm Du Lịch (210.000.000VNĐ/ trường hợp). Không áp dụng cho khách từ 85 tuổi trở lên.</li>
					<li>Trưởng đoàn DL VIỆT suốt tuyến.</li>
					<li>Visa nhập cảnh Hàn Quốc.</li>
					<li>HDV địa phương tại mỗi nơi đến.</li>
					<li>Quà tặng của Du Lịch Việt.</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<br>
<?php
include 'parts/advertisement.php';
include 'parts/footer.php';

if (isset($_POST['addtocart']) && $_POST['addtocart']) {
	if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
		$tour_id = $_POST['idtour'];
		$id_price = $_POST['idprice'];
		$tour_img = $_POST['tourimg'];
		$tour_name = $_POST['tourname'];
		$tour_price = $_POST['tourprice'];
		$tour_amuont = $_POST['touramount'];
		$tour_sum = intval($tour_price) * intval($tour_amuont);
		$tour_con = $_POST['tourcon'];

		$member = $_SESSION['member'];
		$sql_giohang = "INSERT INTO `giohang` (`gh_id`, `idtaikhoan`, `sp_id`, `price_id`, `gh_mount`) VALUES (NULL, '$member[0]', '$tour_id', '$id_price', '$tour_amuont')";
		if ($conn->query($sql_giohang) === TRUE) {
		}
		$sql = "SELECT gh_id FROM `giohang`ORDER by gh_id DESC LIMIT 0,1";
		$rs = mysqli_query($conn, $sql);
		$row_id_gh = mysqli_fetch_array($rs);
		$id_gh = $row_id_gh['gh_id'];
		$_SESSION['cart'];
		$cart = array($id_gh, $tour_img, $tour_name, $tour_price, $tour_amuont, $tour_sum, $tour_id, $tour_con);

		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
		}
		array_push($_SESSION['cart'], $cart);
		header('location: cart.php');
	} else {
?>
		<script>
			alert('Bạn phải đăng nhập để sử dụng!');
		</script>
<?php
	}
}
?>