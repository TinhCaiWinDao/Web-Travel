<?php $page = basename($_SERVER['PHP_SELF']); ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-dark" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Pacific<span>Travel Agency</span></a>
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
                    <li class="nav-item"><a href="../<?php echo $rows['link_header'] ?>" class="nav-link"><?php echo $rows['dmname'] ?></a></li>
                <?php
                }
                ?>
                <li class="nav-item address-p"><a href="#" class="nav-link"><i class="fas fa-user"></i></a>
                    <div class="box-user box-user-edit">
                        <div class="user-content text-center">
                            <?php
                            if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
                                $member = $_SESSION['member'];
                            ?>
                                <h4>Admin</h4>
                                <img src="../images/user.png" alt="">
                                <p class=""><?php echo $member[1] . ' ' . $member[2] ?></p>
                                <p><?php echo $member[3] ?></p>
                                <p class="pd-top-10"><a href="../admin/admain.php">Quản lý Website</a></p>
                                <!-- <p class="mg-t-40"><a href="cart.php">Giỏ hàng</a></p> -->

                                <form action="../member/deleteacc.php" method="post">
                                    <input class="btn btn-primary" type="submit" value="Đăng xuất">
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
</nav>