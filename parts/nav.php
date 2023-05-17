<!DOCTYPE html>
<html lang="en">

<head>
	<title>Travel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php $page = basename($_SERVER['PHP_SELF']); ?>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">Pacific<span>Travel Agency</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">

					<?php
					$sql_header = "SELECT * FROM `danhmuc` WHERE `dmid` > 0  ORDER BY `dmid` ASC;";
					$rs_header = mysqli_query($conn, $sql_header);
					while ($rows = mysqli_fetch_array($rs_header)) {
						$link = $rows['link_header'];

					?>
						<!-- <li class="nav-item active"><a href="index.html" class="nav-link">Trang Chủ</a></li> -->
						<li class="nav-item <?php if ($page == $link) echo 'active'; ?>"><a href="<?php echo $rows['link_header'] ?>" class="nav-link"><?php echo $rows['dmname'] ?></a></li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</nav>