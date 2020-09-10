<?php 
$ma_chuong = $_POST['ma_chuong'];
$ma_chi_muc_cap_1 = $_POST['ma_chi_muc_cap_1'];
$ten_chi_muc_cap_1 = $_POST['ten_chi_muc_cap_1'];
require_once '../../connect.php';
$sql = "update chi_muc_cap_1
set
ten_chi_muc_cap_1 = '$ten_chi_muc_cap_1'
where ma_chi_muc_cap_1 = '$ma_chi_muc_cap_1'"
;
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location:../cau_truc.php?cau_truc=cau_truc_chuong&ma=$ma_chuong");
?>