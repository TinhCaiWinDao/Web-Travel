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

include 'parts/search_ht.php';

include 'parts/put_hotel.php';

include 'parts/advertisement.php';

include 'parts/footer.php';
