<?php
session_start();
ob_start();


include 'admin/conec.php';
global $conn;
?>

<?php
if (isset($_SESSION['member']) && $_SESSION['member']) {
	include 'parts/nav-login.php';
} else {
	include 'parts/nav.php';
}
include 'parts/slider_tt.php';

include 'parts/search.php';

include 'parts/welcome.php';

include 'parts/words.php';

include 'parts/intro_ticket.php';

include 'parts/video.php';

include 'parts/intro.php';

include 'parts/comment.php';

include 'parts/post.php';

include 'parts/advertisement.php';

include 'parts/footer.php';
?>		