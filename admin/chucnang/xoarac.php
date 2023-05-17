<?php
session_start();
ob_start();

include '../conec.php';
global $conn;
if (!isset($_SESSION['member']) && !$_SESSION['member']) {
    exit();
}

if (isset($_POST['addrac']) || isset($_POST['xoarac'])) {
}

if (isset($_GET['id'])) {
    $idrac = $_GET['id'];
} else {
    $idrac = '';
}
$sql_xoa = "DELETE FROM `rac` WHERE `rac_id` ='$idrac';";

if (isset($_POST['xoarac'])) {
    if ($conn->query($sql_xoa) == TRUE) {
        header('location: ../admain.php');
    }
}

if (isset($_POST['addrac'])) {
    $rs_data_rac = mysqli_query($conn, "SELECT * FROM `rac` WHERE `rac_id` = '$idrac';");
    $data = mysqli_fetch_array($rs_data_rac);
    $sp_id = $data['sp_id'];
    $price_id = $data['price_id'];
    $sp_img = $data['sp_img'];
    $sp_date = $data['sp_date'];
    $sp_name = $data['sp_name'];
    $sp_address = $data['sp_address'];
    $sp_soluong = $data['sp_soluong'];
    $sp_gia = $data['sp_gia'];
    $sp_con = $data['sp_con'];
    $sql_insert = "INSERT INTO `sanpham` (`sp_id`, `price_id`,`sp_img`, `sp_date`, `sp_name`, `sp_address`, `sp_soluong` ,`sp_gia`, `sp_con`) VALUES ($sp_id, '$price_id', '$sp_img', '$sp_date', '$sp_name', '$sp_address', '$sp_soluong', '$sp_gia', '$sp_con')";
    if ($conn->query($sql_xoa) == TRUE) {
    }
    if ($conn->query($sql_insert) == TRUE) {
    }
    header('location: ../admain.php');
}
