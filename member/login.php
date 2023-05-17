<?php
session_start();
ob_start();
?>
<section class="ftco-section-2" style="margin-top: 59.925px; ">
    <div class="container">
        <div class="container-content">
            <div class="form text-center">
                <h5 class="navbar-brand">Pacific<span>Travel Agency</span></h5>
                <p>Đăng nhập</p>
                <form class="width-100 mg-b-40" action="" method="post">
                    <div class="row mg-b-20">
                        <div class="col">
                            <div class="address-p">
                                <input class="form-control" type="text" name="dn_mail" id="" required value="">
                                <div class="title-bd">
                                    <p>Email or Số điện thoại</p>
                                </div>
                                <p id="dn_tb1" class="fs-10 text-left color-red d-none">Bạn đã nhập sai email</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mg-b-40">
                        <div class="col">
                            <div class="address-p">
                                <input class="form-control" type="password" name="dn_pass" id="dk2" required value="">
                                <div class="title-bd">
                                    <p>Mật khẩu</p>
                                </div>
                                <span>
                                    <i onclick="showBtn2()" id="showBtn2" class="fas fa-eye text-icon-dn"></i>
                                    <i onclick="showBtn2()" id="hideBtn2" class="fas fa-eye-slash text-icon-dn d-none"></i>
                                </span>
                                <p id="dn_tb2" class="fs-10 text-left color-red d-none">Bạn đã nhập sai mật khẩu</p>
                            </div>
                        </div>
                    </div>

                    <div class="row text-right">
                        <div class="col">
                            <input type="submit" value="Đăng nhập" name="dnbtn" class="btn btn-primary ">
                        </div>
                    </div>
                </form>
                <div class="text-left">
                    <span><a href="dkacc.php">Tạo tài khoản</a></span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
global $row_mail;
if (isset($_POST['dnbtn']) && $_POST['dnbtn']) {
    if (!isset($_POST['dn_mail'])) {
    }
    if (!isset($_POST['dn_pass'])) {
    }

    global $conn;

    $dn_mail = $_POST['dn_mail'];
    $dn_pass = $_POST['dn_pass'];

    $dn_pass = md5($dn_pass);

    $sql_select_mail = "SELECT * FROM `taikhoan` WHERE `email` = '$dn_mail';";
    $rs_mail_dn = mysqli_query($conn, $sql_select_mail);
    $sql_kt_adm = "SELECT * FROM taikhoan WHERE taikhoan.email = '$dn_mail' AND taikhoan.chucvu = 'admin'";
    $rs_ad = mysqli_query($conn, $sql_kt_adm);
    if (($row_mail = mysqli_fetch_array($rs_mail_dn)) < 1) {
        if ($row_mail['email'] !== $dn_mail) {
?>
            <script>
                tb1();

                function tb1() {
                    const tb_1 = document.getElementById('dn_tb1');
                    tb_1.classList.remove('d-none');
                }
            </script>
        <?php
        }
    }
    if ($dn_pass != $row_mail['pass']) {
        ?>
        <script>
            const tb_2 = document.getElementById('dn_tb2');
            tb_2.classList.remove('d-none');
        </script>
<?php
    } else {
        if ($row_adm = mysqli_fetch_array($rs_ad)) {
            $ad_id = $row_adm['idtaikhoan'];
            $ad_ho = $row_adm['tk_ho'];
            $ad_ten = $row_adm['tk_ten'];
            $ad_mail = $row_adm['email'];
            $ad_cv = $row_adm['chucvu'];
            $admin = array($ad_id, $ad_ho, $ad_ten, $ad_mail, $ad_cv);

            if (!isset($_SESSION['member'])) {
                $_SESSION['member'] = array();
            }
            $_SESSION['member'] = $admin;
            // var_dump($_SESSION['member']);
            header('Location: admin/admain.php');
        } else {
            if ($data = mysqli_fetch_assoc($rs_mail_dn)  == true) {
                echo " rasacs";
            }
            $dn_id = $row_mail['idtaikhoan'];
            $dn_ho = $row_mail['tk_ho'];
            $dn_ten = $row_mail['tk_ten'];
            $dn_cv = $row_mail['chucvu'];
            if ($dn_cv == null) {
                $dn_cv = 'mem';
            }
            $member = array($dn_id, $dn_ho, $dn_ten, $dn_mail, $dn_cv);
            if (!isset($_SESSION['member'])) {
                $_SESSION['member'] = array();
            }
            $_SESSION['member'] = $member;
            // var_dump($_SESSION['member']);

            header("Location: index.php");
        }
    }
}
