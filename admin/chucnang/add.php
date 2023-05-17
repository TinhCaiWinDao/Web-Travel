<?php
session_start();
ob_start();

include '../conec.php';
global $conn;
if (!isset($_SESSION['member']) && !$_SESSION['member']) {
    exit();
}

if (!isset($_POST['them'])) {
    exit();
}

if (isset($_POST['sp_img']) && isset($_POST['sp_name']) && isset($_POST['sp_diachi']) && isset($_POST['sp_price']) && isset($_POST['sp_date']) && isset($_POST['sp_soluong'])) {
    $sp_img = $_POST['sp_img'];
    $sp_name = $_POST['sp_name'];
    $sp_diachi = $_POST['sp_diachi'];
    $sp_price = preg_replace('/[^0-9,]/s', '', $_POST['sp_price']);
    $sp_date = $_POST['sp_date'];
    $sp_soluong = $_POST['sp_soluong'];
}

$sql = "INSERT INTO `sanpham` (`sp_id`, `price_id`,`sp_img`, `sp_date`, `sp_name`, `sp_address`, `sp_soluong` ,`sp_gia`, `sp_con`) VALUES (NULL, '1', '$sp_img', '$sp_date', '$sp_name', '$sp_diachi', '$sp_soluong', '$sp_price', '$sp_soluong')";

if ($conn->query($sql) == true) {
    header('Location: ../admain.php');
}
