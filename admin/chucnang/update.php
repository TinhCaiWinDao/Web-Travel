<?php
session_start();
ob_start();

include '../conec.php';
global $conn;
if (!isset($_SESSION['member']) && !$_SESSION['member']) {
    exit();
}

if (isset($_POST['xoasp']) || isset($_POST['suasp'])) {
}

if (isset($_POST['sp_img'])) {
    $sp_img = $_POST['sp_img'];
    echo $sp_img;
}

if (isset($_POST['sp_name'])) {
    $sp_name = $_POST['sp_name'];
    echo $sp_name;
}

if (isset($_POST['sp_price'])) {
    $sp_price = preg_replace('/[^0-9,]/s', '', $_POST['sp_price']);
    echo $sp_price;
}

if (isset($_POST['sp_date'])) {
    $sp_date = $_POST['sp_date'];
    echo $sp_date;
}

if (isset($_POST['sp_soluong'])) {
    $sp_soluong = $_POST['sp_soluong'];
    echo $sp_soluong;
}

if (isset($_POST['sp_con'])) {
    $sp_con = $_POST['sp_con'];
    echo $sp_con;
}


if (isset($_GET['idsp'])) {
    $idsp = $_GET['idsp'];
} else {
    $idsp = '';
}

$admin = $_SESSION['member'];

$idtaikhoan = $admin[0];

if (isset($_POST['xoasp'])) {

    $data_all = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `sp_id`='$idsp';");
    $row_all = mysqli_fetch_array($data_all);

    $sql_xoa = "DELETE FROM `sanpham` WHERE `sanpham`.`sp_id` = '$idsp';";
    $price_id = $row_all['price_id'];
    $sp_date = $row_all['sp_date'];
    $sp_name = $row_all['sp_name'];
    $sp_address = $row_all['sp_address'];
    $sp_shower = $row_all['sp_shower'];
    $sp_king = $row_all['sp_king'];
    $sp_sun_umbrella = $row_all['sp_sun_umbrella'];
    $sp_content = $row_all['sp_content'];
    $sp_soluong = $row_all['sp_soluong'];
    $sp_con = $row_all['sp_con'];
    $sp_gia = $row_all['sp_gia'];
    $sql_add_rac  = "INSERT INTO `rac`(`rac_id`, `idtaikhoan`, `sp_id`, `price_id`, `sp_img`, `sp_date`, `sp_name`, `sp_address`, `sp_shower`, `sp_king`, `sp_sun_umbrella`, `sp_content`, `sp_soluong`, `sp_con`, `sp_gia`) VALUES (NULL,'$idtaikhoan','$idsp','$price_id','$sp_img','$sp_date','$sp_name','$sp_address','$sp_shower','$sp_king','$sp_sun_umbrella','$sp_content','$sp_soluong','$sp_con','$sp_gia')";

    if (mysqli_query($conn, $sql_xoa) == TRUE) {
        if ($conn->query($sql_add_rac) == TRUE) {
        }
    } else {
        echo 'onload = "return alert("Xóa thất bại!!")"';
        header('location: ../admain.php');
    }
    header('location: ../admain.php');
}

if (isset($_POST['suasp'])) {
    // $sql_layidgia = "SELECT `price_id` FROM `price_limit` WHERE `price_value` = '$sp_price'";
    // $rs = mysqli_query($conn, $sql_layidgia);
    // $data_gia = mysqli_fetch_array($rs);
    // $id_gia = $data_gia['price_id'];
    $sql_sua = "UPDATE `sanpham` SET `sp_img`='$sp_img',`sp_date`='$sp_date',`sp_name`='$sp_name',`sp_soluong`='$sp_soluong',`sp_con`='$sp_con', `sp_gia`='$sp_price' WHERE `sanpham`.`sp_id` = '$idsp';";
    if ($conn->query($sql_sua) === TRUE) {
    } else {
        echo 'onload = "return alert("Sửa thất bại!!")"';
        header('location: ../admain.php');
    }
    header('location: ../admain.php');
}
