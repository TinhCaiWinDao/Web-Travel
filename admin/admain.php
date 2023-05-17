<?php
session_start();
ob_start();
include '../admin/conec.php';
global $conn;

if (isset($_SESSION['member']) && $_SESSION['member']) {
    $admin = $_SESSION['member'];
    $sql = "SELECT * FROM `taikhoan` WHERE `idtaikhoan` = '$admin[0]'";
    $rs = mysqli_query($conn, $sql);
    $row_ad = mysqli_fetch_array($rs);
    $chucvu = $row_ad['chucvu'];
    if ($chucvu != 'admin') {
        echo 'Bạn không phải là Admin';
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    include '../parts/nav-admin.php';
    ?>
    <div class="admin">
        <div class="fram">
            <div class="fram-menu-box"></div>
            <div class="fram-menu">
                <div onclick="box1()" id="btn-1" class="fram-btn active-bt">Quản lý tour</div>
                <div onclick="box2()" id="btn-2" class="fram-btn">Tour đã hủy</div>
                <div onclick="box3()" id="btn-3" class="fram-btn">Thêm tour</div>
                <div class="fram-btn"></div>
            </div>
            <div class="fram-content data" id="fram-content" onclick="box()">
                <?php
                $sql_data = "SELECT * FROM `sanpham` INNER JOIN `price_limit` ON `sanpham`.`price_id` = `price_limit`.`price_id`  ORDER BY `sanpham`.`sp_id` ASC;";
                $rs_data = mysqli_query($conn, $sql_data);
                ?>
                <table class="width-100">
                    <thead class="tbl-admin">
                        <tr class="width-100">
                            <th class="width-20 text-center">Ảnh</th>
                            <th class="width-20 text-center">Tên tour</th>
                            <th class="width-15 text-center">Giá</th>
                            <th class="width-15 text-center">Số ngày</th>
                            <th class="width-10 text-center">Số lượng</th>
                            <th class="width-5 text-center">Còn</th>
                            <th class="width-5 text-center">Xóa</th>
                            <th class="width-5 text-center">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row_data = mysqli_fetch_array($rs_data)) {
                        ?>
                            <form action="chucnang/update.php?idsp=<?php echo $row_data['sp_id'] ?>" method="post">
                                <tr class="ql-sp">
                                    <td class="width-20 text-center ql-sp">
                                        <img src="../images/<?php echo $row_data['sp_img'] ?>" alt="">
                                        <input name="sp_img" type="hidden" alt="" value="<?php echo $row_data['sp_img'] ?>">
                                    </td>
                                    <td class="width-20 text-center">
                                        <input type="text" name="sp_name" id="" value="<?php echo $row_data['sp_name'] ?>">
                                    </td>
                                    <td class="width-15 text-center">
                                        <input type="text" name="sp_price" id="" value="<?php echo number_format($row_data['sp_gia'], 0, ',', ' ') ?>">
                                    </td>
                                    <td class="width-15 text-center">
                                        <input type="number" name="sp_date" id="" value="<?php echo trim($row_data['sp_date'], "Tour ngày") ?>">
                                    </td>
                                    <td class="width-10 text-center">
                                        <input type="text" name="sp_soluong" id="" value="<?php echo $row_data['sp_soluong'] ?>">
                                    </td>
                                    <td class="width-5 text-center">
                                        <input type="text" name="sp_con" id="" value="<?php echo $row_data['sp_con'] ?>">
                                    </td>
                                    <td class="width-5 text-center">
                                        <input type="submit" class="nut" name="xoasp" value="Xóa" onclick="return confirm('TIếp tục xóa?')">
                                    </td>
                                    <td class="width-5 text-center">
                                        <input type="submit" class="nut" name="suasp" value="Sửa" onclick="return confirm('Tiế tục sửa?')">
                                    </td>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Box Xóa -->
            <div class="fram-content-xoa d-none data" id="fram-content-xoa">

                <table class="width-100">
                    <thead class="tbl-admin">
                        <tr>
                            <th class="width-15 text-center">Ảnh</th>
                            <th class="width-20 text-center">Tên tour</th>
                            <th class="width-20 text-center">Địa chỉ</th>
                            <th class="width-10 text-center">Giá</th>
                            <th class="width-10 text-center">Số ngày</th>
                            <th class="width-10 text-center">Số lượng</th>
                            <th class="width-5 text-center">Thêm</th>
                            <th class="width-5 text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rs_rac = mysqli_query($conn, "SELECT * FROM `rac`");

                        ?>

                        <?php
                        while ($data_rac = mysqli_fetch_array($rs_rac)) {
                        ?>
                            <form action="chucnang/xoarac.php?id=<?php echo $data_rac['rac_id'] ?>" method="post">
                                <tr class="ql-sp">
                                    <td class="width-15 text-center">
                                        <img src="../images/<?php echo $data_rac['sp_img'] ?>" alt="">
                                        <input name="sp_img" type="hidden" alt="" value="" required>
                                    </td>
                                    <td class="text-center">
                                        <h5><?php echo $data_rac['sp_name'] ?></h5>
                                    </td>
                                    <td class="text-center">
                                        <h5><?php echo $data_rac['sp_address'] ?></h5>
                                    </td>
                                    <td class="text-center">
                                        <h5><?php echo $data_rac['sp_gia'] ?></h5>
                                    </td>
                                    <td class="text-center">
                                        <h5><?php echo $data_rac['sp_date'] ?></h5>
                                    </td>
                                    <td class="text-center">
                                        <h5><?php echo $data_rac['sp_soluong'] ?></h5>
                                    </td>
                                    <td class="text-center">
                                        <input type="submit" value="Thêm" name="addrac" class="nut">
                                    </td>
                                    <td class="text-center">
                                        <input type="submit" value="Xóa" name="xoarac" class="nut">
                                    </td>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>

            </div>

            <!-- Box Add -->
            <div class="fram-content-add d-none data" id="fram-content-add">
                <table class="width-100">
                    <thead class="tbl-admin">
                        <tr class="width-100">
                            <th class="width-15 text-center">Ảnh</th>
                            <th class="width-20 text-center">Tên tour</th>
                            <th class="width-20 text-center">Địa chỉ</th>
                            <th class="width-10 text-center">Giá</th>
                            <th class="width-10 text-center">Số ngày</th>
                            <th class="width-10 text-center">Số lượng</th>
                            <th class="width-5 text-center">Thêm</th>
                        </tr>
                    </thead>
                    <tbody class="tbl-body">
                        <form action="chucnang/add.php" method="post">
                            <tr class="ql-sp-add">
                                <td class="width-15 text-center ql-sp">
                                    <input name="sp_img" type="file" alt="" value="" required>
                                </td>
                                <td class="width-20 text-center">
                                    <input type="text" name="sp_name" id="" value="" required>
                                </td>
                                <td class="width-10 text-center">
                                    <input type="text" name="sp_diachi" id="" value="" required>
                                </td>
                                <td class="width-15 text-center">
                                    <input type="text" name="sp_price" id="" value="" required>
                                </td>
                                <td class="width-15 text-center">
                                    <input type="number" name="sp_date" id="" value="" required>
                                </td>
                                <td class="width-10 text-center">
                                    <input type="text" name="sp_soluong" id="" value="" required>
                                </td>
                                <td class="width-5 text-center">
                                    <input type="submit" class="nut" name="them" value="Thêm" onclick="return confirm('TIếp tục thêm?')">
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../js/js.js"></script>

</body>


</html>