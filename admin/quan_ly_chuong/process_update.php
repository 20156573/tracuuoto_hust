<?php 

$ma_chuong = $_POST['ma_chuong'];
$ten_chuong = $_POST['ten_chuong'];
require_once '../../connect.php';
$sql = "update chuong
set
ten_chuong = '$ten_chuong'
where ma_chuong = '$ma_chuong'"
;
mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:../index.php');
?>