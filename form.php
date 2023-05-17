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
$sql_chitiet = "SELECT * FROM `sanpham` INNER JOIN `price_limit` ON `sanpham`.`price_id` = `price_limit`.`price_id` WHERE `sp_id` = '$id';";
$rs_spchitiet = mysqli_query($conn, $sql_chitiet);

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
                </span> <span>Chi tiết vé <i class="fa fa-chevron-right"></i></span> <span>Xác nhận</span>
            </p>
        </div>
    </div>
</div>

<section class="ftco-section-2">
    <div class="container">
        <div class="row">
            <div class="col-md-1 text-center p-2 border-1 bg-white-tran">
                <span class="color-white span-title">Xóa</span>
            </div>
            <div class="col-md-2 text-center p-2 border-1 bg-white-tran">
                <span class="color-white span-title">Ảnh Tour</span>
            </div>
            <div class="col-md-4 text-center p-2 border-1 bg-white-tran">
                <span class="color-white span-title">Tên Tour</span>
            </div>
            <div class="col-md-2 text-center p-2 border-1 bg-white-tran">
                <span class="color-white span-title">Giá</span>
            </div>
            <div class="col-md-1 text-center p-2 border-1 bg-white-tran">
                <span class="color-white span-title">Số lượng</span>
            </div>
            <div class="col-md-2 text-center p-2 border-1 bg-white-tran">
                <span class="color-white span-title">Thành tiền</span>
            </div>
        </div>

        <?php
        while ($row_chitiet = mysqli_fetch_array($rs_spchitiet)) {
        ?>
            <div class="row">
                <div class="col-md-1 tbl-center">
                    <i class="fa-2 fa fa-times"></i>
                </div>
                <div class="col-md-2 p-2 tbl-center">
                    <img class="img-2-sub" src="images/<?php echo $row_chitiet['sp_img'] ?>" alt="">
                </div>
                <div class="col-md-4 tbl-center">
                    <h4><?php echo $row_chitiet['sp_name'] ?></h4>
                </div>
                <div class="col-md-2 tbl-center">
                    <h5><?php echo $row_chitiet['sp_gia'] . ' VNĐ' ?></h5>
                </div>
                <div class="col-md-1 tbl-center">
                    <input class="amout-input" type="number" name="" id="" value="1">
                </div>
                <div class="col-md-2 tbl-center">
                    <h5><?php echo $row_chitiet['price_value'] . ' VNĐ' ?></h5>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section class="ftco-section-2">
    <div class="container">
        <h3 style="padding: 20px 0; text-transform: uppercase; font-weight: 700;" class="text-center ">Thông tin đặt vé</h3>
        <div class="form-width">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="color-black" for="">Họ và tên*</label>
                        <input class="form-control color-black" type="text" name="" id="">
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="color-black" for="">Điện thoại*</label>
                        <input class="form-control color-black" type="text" name="" id="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="color-black" for="">Email*</label>
                        <input class="form-control color-black" type="email" name="" id="">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="color-black" for="">Địa chỉ</label>
                        <input class="form-control color-black" type="text" name="" id="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label class="color-black" for="#">Yêu cầu khác</label>
                        <textarea class="form-control color-black" name="" id="" cols="30" rows="2"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label class="color-black" for="">Nhập mã giảm giá (Nếu có)</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <input class="form-control color-black" type="text" name="" id="">
                    </div>
                    <div class="col-md-2">
                        <input class="btn btn-primary form-control color-black" type="submit" value="Áp dụng">
                    </div>
                </div>

                <div class="row">
                    <div class="col radio-2">
                        <input class="active color-black" type="radio" name="" id="" checked>
                        <label class="color-black" for="">Thanh toán khi nhận vé</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include 'parts/footer.php'
?>