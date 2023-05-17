<?php
session_start();
ob_start();

include 'admin/conec.php';
global $conn;

if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
    include 'parts/navchitietlg.php';
    $member = $_SESSION['member'];
    $sql_kt_tk = "SELECT giohang.idtaikhoan FROM giohang WHERE giohang.idtaikhoan = '$member[0]';";
    $rs_kt_tk = mysqli_query($conn, $sql_kt_tk);

    $rsdata_kt_tour = mysqli_query($conn, "SELECT * FROM `tour` INNER JOIN `sanpham` ON `tour`.`sp_id` = `sanpham`.`sp_id` WHERE `tour`.`idtaikhoan` = '$member[0]';");
    $rs_kt_soluong = mysqli_query($conn, "SELECT COUNT(*) AS `soluong`  FROM `tour` WHERE `tour`.`idtaikhoan` = '$member[0]';");
    global $data_tour;
    $soluong = mysqli_fetch_array($rs_kt_soluong);
} else {
    include 'parts/navchitiet.php';
}
?>
<div class="container-2">
    <div class="row no-gutters slider-text-2 align-items-end justify-content-center" style="padding-top: 20px;">
        <div class="col-md-9 pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Đặt vé <i class="fa fa-chevron-right"></i>
                </span> <span>Chi tiết vé <i class="fa fa-chevron-right"></i></span> <span>Đơn hàng</span>
            </p>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
}
if (isset($_SESSION['tour']) && $_SESSION['tour'] != null) {
    // var_dump($_SESSION['tour']);
?>
    <section class="ftco-section-2">
        <div class="container">
            <table class="tbl">
                <thead style="color: #f15d30;">
                    <tr class="col-md-1 text-center p-2 border-1 bg-white-tran">
                        <th class="width-25">Ảnh Tour</th>
                        <th class="width-30">Tên Tour</th>
                        <th class="width-15">Giá</th>
                        <th>Số lượng</th>
                        <th class="width-15">Thành tiền</th>
                    </tr>
                </thead>
                <tbody class=" tbl-body">
                    <?php
                    foreach ($_SESSION['tour'] as $tour) {
                    ?>
                        <tr>
                            <td><img src="images/<?php echo $tour[1]; ?>" alt=""></td>
                            <td>
                                <h5><?php echo $tour[2] ?></h5>
                            </td>
                            <td>
                                <h5><?php echo $tour[3] ?></h5>
                            </td>
                            <td>
                                <h5><?php echo $tour[4] ?></h5>
                            </td>
                            <td>
                                <h5><?php echo $tour[5] ?></h5>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
<?php
} elseif ($soluong > 0) {
?>
    <section class="ftco-section-2">
        <div class="container">
            <table class="tbl">
                <thead style="color: #f15d30;">
                    <tr class="col-md-1 text-center p-2 border-1 bg-white-tran">
                        <th class="width-25">Ảnh Tour</th>
                        <th class="width-30">Tên Tour</th>
                        <th class="width-15">Giá</th>
                        <th>Số lượng</th>
                        <th class="width-15">Thành tiền</th>
                    </tr>
                </thead>
                <tbody class=" tbl-body">
                    <?php
                    while ($data_tour = mysqli_fetch_array($rsdata_kt_tour)) {
                        // var_dump($row);
                        $tour_id = $data_tour['idtour'];
                        // echo $tour_id;
                        $tour_img = $data_tour['sp_img'];
                        // echo $tour_img;
                        $tour_name = $data_tour['sp_name'];
                        // echo $tour_name;
                        $tour_gia = $data_tour['tour_gia'];
                        // echo $tour_gia;
                        $tour_mount = $data_tour['tour_mount'];
                        // echo $tour_mount;
                        $tour_sum = $data_tour['tour_sum'];
                        // echo $tour_sum;



                        if (!isset($_SESSION['tour'])) {
                            $_SESSION['tour'] = array();
                        }
                        // $_SESSION['tour'];
                        $tour = array($tour_id, $tour_img, $tour_name, $tour_gia, $tour_mount, $tour_sum);

                        array_push($_SESSION['tour'], $tour);
                    ?>
                        <tr>
                            <td><img src="images/<?php echo $data_tour['sp_img'] ?>" alt=""></td>
                            <td>
                                <h5><?php echo $data_tour['sp_name'] ?></h5>
                            </td>
                            <td>
                                <h5><?php echo $data_tour['tour_gia'] ?></h5>
                            </td>
                            <td>
                                <h5><?php echo $data_tour['tour_mount'] ?></h5>
                            </td>
                            <td>
                                <h5><?php echo $data_tour['tour_sum'] ?></h5>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php
} else {
    if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
        if (!isset($_SESSION['tour']) || $_SESSION['tour'] == null) {
    ?>
            <section class="ftco-section-2">
                <div class="container">
                    <h2 class="text-center" style="font-weight: 500;">ĐƠN TRỐNG</h2>
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
}
?>
<?php

include 'parts/footer.php'
?>