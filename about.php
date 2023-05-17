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

include 'parts/welcome.php';

include 'parts/video.php';

include 'parts/intro.php';

include 'parts/comment.php';

include 'parts/advertisement.php';

include 'parts/footer.php';
