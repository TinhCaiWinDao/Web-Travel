<?php
session_start();
ob_start();
include 'admin/conec.php';
global $conn;

if (isset($_SESSION['member']) && $_SESSION['member']) {
  include 'parts/nav-login.php';
} else {
  include 'parts/nav.php';
}

include 'parts/slider.php';
?>

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      <?php
      $sql_blog = "SELECT * FROM `blog` ORDER BY `blog_id` ASC;";
      $rs_blog = mysqli_query($conn, $sql_blog);
      while ($rows_blog = mysqli_fetch_array($rs_blog)) {
      ?>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
            <a href="blog-single.php" class="block-20" style="background-image: url('images/<?php echo $rows_blog['blog_img'] ?>');">
            </a>
            <div class="text">
              <div class="d-flex align-items-center mb-4 topp">
                <div class="one">
                  <span class="day"><?php echo $rows_blog['blog_day'] ?></span>
                </div>
                <div class="two">
                  <span class="yr"><?php echo $rows_blog['blog_year'] ?></span>
                  <span class="mos"><?php echo $rows_blog['blog_mont'] ?></span>
                </div>
              </div>
              <h3 class="heading"><a href="#"><?php echo $rows_blog['blog_title'] ?></a></h3>
              <p><?php echo $rows_blog['blog_value'] ?></p>
              <p><a href="#" class="btn btn-primary">Đọc thêm</a></p>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include 'parts/advertisement.php'
?>

<?php
include 'parts/footer.php'
?>