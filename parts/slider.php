<?php
global $conn;
$page = basename($_SERVER['PHP_SELF']);
$sql_danhmuc_sl = "SELECT `dmname`, `link_header` FROM `danhmuc`;";
$rs_dm_sl = mysqli_query($conn, $sql_danhmuc_sl);
while ($row_dm_sl = mysqli_fetch_array($rs_dm_sl)) {
  $link = $row_dm_sl['link_header'];
  if ($page == $link) {
?>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span><?php echo ucfirst(strtolower($row_dm_sl['dmname'])) ?> <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread"><?php echo $row_dm_sl['dmname'] ?></h1>
          </div>
        </div>
      </div>
    </section>
<?php
  }
}
