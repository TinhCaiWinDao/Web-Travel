<section class="ftco-section-2" style="margin-top: 59.925px; ">
    <div class="container">
        <div class="container-content">
            <div class="form text-center">
                <h5 class="navbar-brand">Pacific<span>Travel Agency</span></h5>
                <p>Tạo tài khoản mới</p>
                <form class="width-100 mg-b-40" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="row mg-b">
                        <div class="col">
                            <input class="form-control fs-14" type="text" name="a_ho" id="" placeholder="Họ" required value="">
                        </div>
                        <div class="col">
                            <input class="form-control fs-14" type="text" name="a_name" id="" placeholder="Tên" required value="">
                        </div>
                    </div>

                    <div class="row mg-b">
                        <div class="col address-p">
                            <input oninput="hideMail()" id="input_mail" class="form-control fs-14" type="email" name="inputmail" id="" placeholder="Tên người dùng" required value="">
                            <p id="tag-p" class="color-black text-mail">@gmail.com</p>
                            <p id="tb-1" class="fs-10 text-left">Bạn có thể sử dụng chữ cái, số và dấu chấm</p>
                            <p id="tb-2" class="fs-10 text-left color-red d-none">Email này đã được đăng ký</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="dk col address-p">
                            <input class="form-control fs-14" type="password" name="a_pass" id="dk1" placeholder="Mật khẩu" required value="">
                            <span>
                                <i onclick="showBtn1()" id="showBtn1" class="fas fa-eye text-icon"></i>
                                <i onclick="showBtn1()" id="hideBtn1" class="fas fa-eye-slash text-icon d-none"></i>
                            </span>
                        </div>
                        <div class="col address-p">
                            <input class="form-control fs-14" type="password" name="a_pass2" id="dk2" placeholder="Nhập lại mật khẩu" required value="">
                            <span>
                                <i onclick="showBtn2()" id="showBtn2" class="fas fa-eye text-icon"></i>
                                <i onclick="showBtn2()" id="hideBtn2" class="fas fa-eye-slash text-icon d-none"></i>
                            </span>
                        </div>
                    </div>
                    <p id="tb-3" class="fs-10 text-left color-red mg-b-40 d-none">Mật khẩu phải giống nhau</p>

                    <div class="row text-right mg-t-40">
                        <div class="col">
                            <input type="submit" value="Đăng ký" name="dkbtn" class="btn btn-primary ">
                        </div>
                    </div>
                </form>
                <div class="text-left">
                    <span><a href="dnacc.php">Đăng nhập</a></span>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

if (isset($_POST['dkbtn']) && $_POST['dkbtn']) {
    if (!isset($_POST['inputmail'])) {
    }

    if (!isset($_POST['a_ho'])) {
    }

    if (!isset($_POST['a_name'])) {
    }

    if (!isset($_POST['a_pass'])) {
    }

    if (!isset($_POST['a_pass2'])) {
    }

    include 'admin/conec.php';
    global $conn;


    $err = [];

    $a_ho = $_POST['a_ho'];
    $a_name = $_POST['a_name'];
    $a_mail = $_POST['inputmail'];
    $a_pass = $_POST['a_pass'];
    $a_pass2 = $_POST['a_pass2'];

    $a_pass = md5($a_pass);
    $a_pass2 = md5($a_pass2);

    $sql_select_mail = "SELECT * FROM `taikhoan` WHERE `email` = '$a_mail';";
    $rs_mail = mysqli_query($conn, $sql_select_mail);


    if ($row_mail = mysqli_fetch_array($rs_mail) > 0) {
        // header('location: dkacc.php');
?>
        <script>
            thongbao()

            function thongbao() {
                const mail1 = document.getElementById('tb-1');
                const mail2 = document.getElementById('tb-2')
                mail1.classList.add('d-none');
                mail2.classList.remove('d-none');
            }
        </script>
    <?php
    }
    if ($a_pass != $a_pass2) {
    ?>
        <script>
            tb3();

            function tb3() {
                const tb_3 = document.getElementById('tb-3')
                tb_3.classList.remove('d-none');
            }
        </script>
        <?php
    } else {
        $sql_insert_acc = "INSERT INTO `taikhoan` (`idtaikhoan`, `tk_ho`, `tk_ten`, `email`, `pass`, `chucvu`) VALUES (NULL, '$a_ho', '$a_name', '$a_mail', '$a_pass', '$a_pass2')";

        if ($conn->query($sql_insert_acc) === TRUE) {
        ?>
            <script>
                alert('Tạo tài khoản thành công')
            </script>
<?php
        }
    }
}
?>