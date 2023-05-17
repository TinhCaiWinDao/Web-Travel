<?php
session_start();
ob_start();
if (isset($_SESSION['member']) && $_SESSION['member'] != null) {
    if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
        $tour_id = $_POST['idtour'];
        $id_price = $_POST['idprice'];
        $tour_img = $_POST['tourimg'];
        $tour_name = $_POST['tourname'];
        $tour_price = $_POST['tourprice'];
        $tour_amuont = $_POST['touramount'];
        $tour_sum = intval($tour_price) * intval($tour_amuont);

        $member = $_SESSION['member'];
        var_dump($member);
        echo $member[0];
        echo $tour_id;
        echo $id_price;
        echo $tour_amuont;
        // exit();
        $idtaikhoan = $member[0];
        $sql_giohang = "INSERT INTO `giohang` (`gh_id`, `idtaikhoan`, `sp_id`, `price_id`, `gh_mount`) VALUES (NULL, '$idtaikhoan', '$tour_id', '$id_price', '$tour_amuont')";
        if ($conn->query($sql_giohang) === TRUE) {
        }
        $cart = array($tour_id, $tour_img, $tour_name, $tour_price, $tour_amuont, $tour_sum);

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        array_push($_SESSION['cart'], $cart);

        // echo var_dump($_SESSION['cart']);

        header('location: ../cart.php');
    }
}
