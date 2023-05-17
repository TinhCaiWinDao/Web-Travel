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
$a = -1;


if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
    include 'parts/navchitietlg.php';
    $member = $_SESSION['member'];
    $sql_kt_tk = "SELECT giohang.idtaikhoan FROM giohang WHERE giohang.idtaikhoan = '$member[0]';";
    $rs_kt_tk = mysqli_query($conn, $sql_kt_tk);
} else {
    include 'parts/navchitiet.php';
}
?>
<div class="container-2">
    <div class="row no-gutters slider-text-2 align-items-end justify-content-center" style="padding-top: 20px;">
        <div class="col-md-9 pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Đặt vé <i class="fa fa-chevron-right"></i>
                </span> <span>Chi tiết vé <i class="fa fa-chevron-right"></i></span> <span>Giỏ hàng</span>
            </p>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
}
if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
    // var_dump($_SESSION['cart']);
?>
    <section class="ftco-section-2">
        <div class="container">
            <table class="tbl">
                <thead style="color: #f15d30;">
                    <tr class="col-md-1 text-center p-2 border-1 bg-white-tran">
                        <th>Xóa</th>
                        <th class="width-25">Ảnh Tour</th>
                        <th class="width-30">Tên Tour</th>
                        <th class="width-15">Giá</th>
                        <th>Số lượng</th>
                        <th class="width-15">Thành tiền</th>
                        <th>Thanh toán</th>
                    </tr>
                </thead>
                <tbody class="tbl-body">
                    <?php

                    foreach ($_SESSION['cart'] as $cart) {
                        $sl_con = $cart[7];
                        // echo 'Số lượng: ' . $sl_con . '<br>';

                        $a++;
                    ?>
                        <tr>
                            <!-- <td><a href="datve/delete_idss.php?id=<?php echo $a ?>"><i class="fa-2 fa fa-times"></i></a></td> -->
                            <td>
                                <form action="datve/delete_idss.php" method="post">
                                    <div class="btn-delete-cart address-p">
                                        <input type="hidden" name="id_session" value="<?php echo $a ?>">
                                        <input type="hidden" name="gh_id" value="<?php echo $cart[0] ?>">
                                        <input type="submit" name="subdelete" value="">
                                        <i class="fa-2 fa fa-times"></i>
                                    </div>
                                </form>
                            </td>
                            <td class="posi"><img src="images/<?php echo $cart[1] ?>">
                                <?php
                                if ($cart[7] < 1) {
                                ?>
                                    <div class="hetve">
                                        <p>Hết vé</p>
                                    </div>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <h4><?php echo $cart[2] ?></h4>
                            </td>
                            <td>
                                <h5><?php echo number_format($cart[3], 0, ',', '.') . ' VNĐ' ?></h5>
                            </td>
                            <td>
                                <h5><?php echo $cart[4] ?></h5>
                            </td>
                            <td>
                                <h5><?php echo number_format($cart[5], 0, ',', '.') . ' VNĐ' ?></h5>
                            </td>
                            <td>
                                <form action="datve/addtour.php?id=<?php echo $a ?>" method="post">
                                    <input type="hidden" name="tour_id" id="tour_id" value="<?php echo $cart[0] ?>">
                                    <input type="hidden" name="tour_img" id="tour_img" value="<?php echo $cart[1] ?>">
                                    <input type="hidden" name="tour_name" id="tour_name" value="<?php echo $cart[2] ?>">
                                    <input type="hidden" name="tour_gia" id="tour_gia" value="<?php echo $cart[3] ?>">
                                    <input type="hidden" name="tour_mount" id="tour_mount" value="<?php echo $cart[4] ?>">
                                    <input type="hidden" name="tour_sum" id="tour_sum" value="<?php echo $cart[5] ?>">
                                    <input type="hidden" name="sp_id" id="sp_id" value="<?php echo $cart[6] ?>">
                                    <input type="submit" name="tour_sub" id="tour_sub" value="Ok" class="btn btn-primary" onclick="return confirm('Bạn muốn đặt vé?')">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <p><a class="btn btn-primary py-3 px-4" href="datve/delete_ss.php">Xóa giỏ hàng</a></p>
        </div>
    </section>
<?php
} elseif ($row_kt_tk = mysqli_fetch_array($rs_kt_tk) > 0) {
?>
    <section class="ftco-section-2">
        <div class="container">
            <table class="tbl">
                <thead style="color: #f15d30;">
                    <tr class="col-md-1 text-center p-2 border-1 bg-white-tran">
                        <th>Xóa</th>
                        <th class="width-25">Ảnh Tour</th>
                        <th class="width-30">Tên Tour</th>
                        <th class="width-15">Giá</th>
                        <th>Số lượng</th>
                        <th class="width-15">Thành tiền</th>
                        <th>Thanh toán</th>
                    </tr>
                </thead>
                <tbody class=" tbl-body">
                    <?php
                    $sql_select_gh = "SELECT giohang.gh_id ,giohang.idtaikhoan, sanpham.sp_img, sanpham.sp_name, price_limit.price_value, giohang.gh_mount, price_limit.price_id, sanpham.sp_id, sanpham.sp_con FROM giohang INNER JOIN taikhoan ON taikhoan.idtaikhoan = giohang.idtaikhoan INNER JOIN sanpham ON sanpham.sp_id = giohang.sp_id INNER JOIN price_limit ON price_limit.price_id = giohang.price_id WHERE taikhoan.idtaikhoan = '$member[0]';";
                    $rs_gh = mysqli_query($conn, $sql_select_gh);
                    while ($row_giohang = mysqli_fetch_array($rs_gh)) {
                        $sp_id = $row_giohang['sp_id'];
                        $tour_id = $row_giohang['gh_id'];
                        $id_price = $row_giohang['price_id'];
                        $tour_img = $row_giohang['sp_img'];
                        $tour_name = $row_giohang['sp_name'];
                        $tour_price = $row_giohang['price_value'];
                        $tour_amuont = $row_giohang['gh_mount'];
                        $tour_sum = intval($tour_price) * intval($tour_amuont);
                        $tour_con = $row_giohang['sp_con'];
                        echo $tour_con;
                        $cart = array($tour_id, $tour_img, $tour_name, $tour_price, $tour_amuont, $tour_sum, $sp_id, $tour_con);

                        if (!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = array();
                        }
                        array_push($_SESSION['cart'], $cart);
                        // var_dump($_SESSION['cart']);
                    }

                    if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
                        foreach ($_SESSION['cart'] as $cart) {
                            $a++;
                    ?>
                            <tr>
                                <!-- <td><a href="datve/delete_idss.php?id=<?php echo $a ?>"><i class="fa-2 fa fa-times"></i></a></td> -->
                                <td>
                                    <form action="datve/delete_idss.php" method="post">
                                        <div class="btn-delete-cart address-p">
                                            <input type="hidden" name="id_session" value="<?php echo $a ?>">
                                            <input type="hidden" name="gh_id" value="<?php echo $cart[0] ?>">
                                            <input type="submit" name="subdelete" value="">
                                            <i class="fa-2 fa fa-times"></i>
                                        </div>
                                    </form>
                                </td>
                                <td class="posi"><img src="images/<?php echo $cart[1] ?>">
                                    <?php
                                    if ($cart[7] < 1) {
                                        // echo $cart[7] . '<br>';
                                    ?>
                                        <div class="hetve">
                                            <p>Hết vé</p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <h4><?php echo $cart[2] ?></h4>
                                </td>
                                <td>
                                    <h5><?php echo number_format($cart[3], 0, ',', '.') . ' VNĐ' ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $cart[4] ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo number_format($cart[5], 0, ',', '.') . ' VNĐ' ?></h5>
                                </td>
                                <td>
                                    <form action="datve/addtour.php?id=<?php echo $a ?>" method="post">
                                        <input type="hidden" name="tour_id" id="tour_id" value="<?php echo $cart[0] ?>">
                                        <input type="hidden" name="tour_img" id="tour_img" value="<?php echo $cart[1] ?>">
                                        <input type="hidden" name="tour_name" id="tour_name" value="<?php echo $cart[2] ?>">
                                        <input type="hidden" name="tour_gia" id="tour_gia" value="<?php echo $cart[3] ?>">
                                        <input type="hidden" name="tour_mount" id="tour_mount" value="<?php echo $cart[4] ?>">
                                        <input type="hidden" name="tour_sum" id="tour_sum" value="<?php echo $cart[5] ?>">
                                        <input type="hidden" name="sp_id" id="sp_id" value="<?php echo $cart[6] ?>">
                                        <input type="submit" name="tour_sub" id="tour_sub" value="Ok" class="btn btn-primary" onclick="return confirm('Bạn muốn đặt vé?')">
                                    </form>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <p><a class="btn btn-primary py-3 px-4" href="datve/delete_ss.php">Xóa giỏ hàng</a></p>
        </div>
    </section>
<?php
}
?>
<?php
if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
    if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
?>
        <section class="ftco-section-2">
            <div class="container">
                <h2 class="text-center" style="font-weight: 500;">GIỎ HÀNG TRỐNG</h2>
                <div class="text-center">
                    <p>Đặt tour tại đây</p>
                    <i class="text-center fas fa-arrow-down fa-2" style="font-size: 60px;"></i>
                </div>
                <p class="text-center"><a class="btn btn-primary py-3 px-4" href="destination.php">Đặt vé tại đây</a></p>
            </div>
        </section>
<?php
    }
}
include 'parts/footer.php'
?>