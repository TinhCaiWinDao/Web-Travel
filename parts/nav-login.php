<!DOCTYPE html>
<html lang="en">

<head>
    <title>Travel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/css.css">
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
                    $sql_header = "SELECT * FROM `danhmuc` WHERE `dmid` > 0 AND `active` = '0' ORDER BY `dmid` ASC;";
                    $rs_header = mysqli_query($conn, $sql_header);
                    while ($rows = mysqli_fetch_array($rs_header)) {
                        $link = $rows['link_header'];
                    ?>
                        <li class="nav-item <?php if ($page == $link) echo 'active'; ?>"><a href="<?php echo $rows['link_header'] ?>" class="nav-link"><?php echo $rows['dmname'] ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="nav-item address-p"><a href="#" class="nav-link"><i class="fas fa-user"></i></a>
                        <div class="box-user">
                            <div class="user-content text-center">
                                <?php
                                if (isset($_SESSION['member']) && $_SESSION['member']) {
                                    $admin = $_SESSION['member'];
                                    $sql = "SELECT * FROM `taikhoan` WHERE `idtaikhoan` = '$admin[0]'";
                                    $rs = mysqli_query($conn, $sql);
                                    $row_ad = mysqli_fetch_array($rs);
                                    $chucvu = $row_ad['chucvu'];
                                    if ($chucvu != 'admin') {
                                        if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
                                            $member = $_SESSION['member'];
                                ?>
                                            <img src="images/user.png" alt="">
                                            <p class=""><?php echo $member[1] . ' ' . $member[2] ?></p>
                                            <p><?php echo $member[3] ?></p>
                                            <p class="pd-top-10"><a href="">Quản lý tài khoản</a></p>
                                            <div class="nav-btn">
                                                <p class="mg-t-40"><a href="cart.php">Giỏ hàng</a></p>
                                                <p class="mg-t-40"><a href="tour.php">Vé đã mua</a></p>
                                            </div>
                                            <form action="member/deleteacc.php" method="post">
                                                <input class="btn btn-primary" type="submit" value="Đăng xuất">
                                            </form>
                                        <?php
                                        }
                                    }
                                    if ($chucvu == 'admin') {
                                        ?>
                                        <h4>Admin</h4>
                                        <img src="images/user.png" alt="">
                                        <p class=""><?php echo $admin[1] . ' ' . $admin[2] ?></p>
                                        <p><?php echo $admin[3] ?></p>
                                        <p class="pd-top-10"><a href="admin/admain.php">Quản lý Website</a></p>
                                        <!-- <p class="mg-t-40"><a href="cart.php">Giỏ hàng</a></p> -->

                                        <form action="member/deleteacc.php" method="post">
                                            <input class="btn btn-primary" type="submit" value="Đăng xuất">
                                        </form>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>