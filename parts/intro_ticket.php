<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Destination</span>
				<h2 class="mb-4">Tour Destination</h2>
			</div>
		</div>
		<div class="row">
			<?php
			while ($row_price = mysqli_fetch_array($rs_price)) {
				$price_id = $row_price['price_id'];
			}
			$sql_sp = "SELECT * FROM `sanpham` INNER JOIN `price_limit` ON `sanpham`.`price_id` = `price_limit`.`price_id` WHERE `sp_id` >=1 AND `sp_id` <=6 ORDER BY `sp_id` ASC;";
			$rs_sp = mysqli_query($conn, $sql_sp);

			while ($row_sp = mysqli_fetch_array($rs_sp)) {
			?>

				<div class="col-md-4 ftco-animate">
					<div class="project-wrap">
						<a href="product.php?id=<?php echo $row_sp['sp_id'] ?>" class="img" style="background-image: url(images/<?php echo $row_sp['sp_img']; ?>);">
							<span class="price"><?php echo number_format($row_sp['sp_gia'], 0, ',', '.') . "/VNĐ"   ?></span>
						</a>
						<div class="text p-4">
							<span class="days">Tour <?php echo $row_sp['sp_date'] ?> ngày</span>
							<h3><a href="#"><?php echo $row_sp['sp_name'] ?></a></h3>
							<p class="location"><span class="fa fa-map-marker"></span><?php echo $row_sp['sp_address'] ?></p>
							<ul>
								<li><span class="flaticon-shower"></span><?php echo $row_sp['sp_shower'] ?></li>
								<li><span class="flaticon-king-size"></span><?php echo $row_sp['sp_king'] ?></li>
								<li><span class="flaticon-mountains"></span><?php echo $row_sp['sp_sun_umbrella'] ?></li>
							</ul>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</section>