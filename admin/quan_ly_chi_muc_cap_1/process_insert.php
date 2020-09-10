<?php 

$ma_chuong			= $_POST['ma_chuong'];
// $ten_chuong			= $_POST['ten_chuong'];
$ten_chi_muc_cap_1 	= $_POST['ten_chi_muc_cap_1'];
require_once '../../connect.php';
$sql = "insert into chi_muc_cap_1 (ma_chuong, ten_chi_muc_cap_1) values ('$ma_chuong', '$ten_chi_muc_cap_1')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: ../cau_truc.php?cau_truc=cau_truc_chuong&ma=$ma_chuong");
?>