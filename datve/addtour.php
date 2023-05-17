<?php
session_start();
include '../admin/conec.php';
global $conn;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}
if (!isset($_SESSION['member'])) {
    echo 'Bạn chưa đăng nhập!';
    exit();
}
if (!isset($_POST['tour_sub'])) {
}
$mem = $_SESSION['member'];
$tour_id = $_POST['tour_id'];
$tour_img = $_POST['tour_img'];
$tour_name = $_POST['tour_name'];
$tour_gia = $_POST['tour_gia'];
$tour_mount = $_POST['tour_mount'];
$tour_sum = $_POST['tour_sum'];
$sp_id = $_POST['sp_id'];
$id_tk = $mem[0];

$sql_ktsp = "SELECT `sp_con` FROM `sanpham` WHERE `sp_id`= '$sp_id' AND `sp_con` > 0";

$rs = mysqli_query($conn, $sql_ktsp);
$soluongsp = mysqli_fetch_array($rs);
$con = $soluongsp['sp_con'];

$soluong = $soluongsp['sp_con'];
echo $soluong;

if ($con >= $soluong) {
    if (isset($_SESSION['cart'])) {
        array_splice($_SESSION['cart'], $id, 1);
    }
    if ($conn->query("DELETE FROM `giohang` WHERE `giohang`.`gh_id` = '$tour_id';") == true) {
    }


    if ($conn->query("UPDATE `sanpham` SET `sp_con`= `sp_con` - '$tour_mount' WHERE `sp_id` = '$sp_id'") == true) {
    }
    if ($conn->query("INSERT INTO `tour` (`idtour`, `idtaikhoan`, `sp_id`, `tour_gia`, `tour_mount`, `tour_sum`) VALUES (NULL, '$id_tk', '$sp_id', '$tour_gia', '$tour_mount', '$tour_sum')") == TRUE) {
        header('Location: ../cart.php');
    }

    $_SESSION['tour'];
    $tour = array($tour_id, $tour_img, $tour_name, $tour_gia, $tour_mount, $tour_sum);
    if (!isset($_SESSION['tour'])) {
        $_SESSION['tour'] = array();
    }
    array_push($_SESSION['tour'], $tour);
} else {
?>
    <script>
        if (confirm("Đã hết ve!!") == true) {
            window.location = "../cart.php";
        } else {
            window.location = "../cart.php";

        }
    </script>

<?php
    // header('Location: ../cart.php');
}
