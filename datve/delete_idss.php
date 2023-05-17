<?php
session_start();
ob_start();
include '../admin/conec.php';
global $conn;

if (isset($_POST['subdelete'])) {
    $id_session = $_POST['id_session'];
    $gh_id = $_POST['gh_id'];
}
if (isset($_SESSION['cart'])) {
    $sql = "SELECT gh_id FROM giohang WHERE gh_id = '$gh_id';";
    $rs = mysqli_query($conn, $sql);
    echo 'ID: ' . $id_session . '<br>';
    echo 'ID: ' . $gh_id;
}
if ($row = mysqli_fetch_array($rs) > 0) {
    array_splice($_SESSION['cart'], $id_session, 1);
    $sql_Dele = "DELETE FROM `giohang` WHERE `giohang`.`gh_id` = '$gh_id';";
    mysqli_query($conn, $sql_Dele);
    header('location: ../cart.php');
}
