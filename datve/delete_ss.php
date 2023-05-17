<?php
session_start();
ob_start();

include '../admin/conec.php';
global $conn;
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
    $sql = "DELETE FROM giohang;";
    if ($conn->query($sql) === TRUE) {
    }
}

header('location: ../cart.php');
