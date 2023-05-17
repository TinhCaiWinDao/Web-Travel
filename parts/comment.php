<section class="ftco-section testimony-section bg-bottom" style="background-image: url(images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center pb-4">
					<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
						<span class="subheading">Comment</span>
						<h2 class="mb-4">Phản hồi của du khách</h2>
					</div>
				</div>
				<div class="row ftco-animate">
					<div class="col-md-12">
						<div class="carousel-testimony owl-carousel">
							<?php
								$sql_comment = "SELECT * FROM `comment` ORDER BY `comment_id` ASC;";
								$rs_comment = mysqli_query($conn, $sql_comment);
								while ($row_comment = mysqli_fetch_array($rs_comment)) {
							?>
							<div class="item">
								<div class="testimony-wrap py-4">
									<div class="text">
										<p class="star">
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</p>
										<p class="mb-4"><?php echo $row_comment['comment_value']; ?></p>
										<div class="d-flex align-items-center">
											<div class="user-img" style="background-image: url(images/<?php echo $row_comment['comment_img']; ?>)"></div>
											<div class="pl-3">
												<p class="name"><?php echo $row_comment['comment_name']; ?></p>
												<span class="position"><?php echo $row_comment['comment_nghenghiep']; ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</section>