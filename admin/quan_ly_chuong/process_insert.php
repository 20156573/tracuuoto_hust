<?php 

$ten_chuong = $_POST['ten_chuong'];
require_once '../../connect.php';
$sql = "insert into chuong (ten_chuong) values ('$ten_chuong')";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php');
?>