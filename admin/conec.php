<?php
$svname = "localhost";
$dbname = "root";
$dbpass = "";
$database = "dulich";
global $conn;

$conn = mysqli_connect($svname, $dbname, $dbpass);
if (!$conn) {
    die('Kết nối thất bại!!');
}
mysqli_select_db($conn, $database);
