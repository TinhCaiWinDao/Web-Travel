<?php
session_start();
ob_start();
if (isset($_SESSION['member'])) {
    unset($_SESSION['member']);
    unset($_SESSION['cart']);
    unset($_SESSION['tour']);
    session_destroy();
}

header("Location: ../index.php");
