<?php 
$ma_chi_muc_cap_2 = $_POST['ma_chi_muc_cap_2'];
$ma_chi_muc_cap_1 = $_POST['ma_chi_muc_cap_1'];
$ten_chi_muc_cap_2 = $_POST['ten_chi_muc_cap_2'];
require_once '../../connect.php';
$sql = "update chi_muc_cap_2
set
ten_chi_muc_cap_2 = '$ten_chi_muc_cap_2'
where ma_chi_muc_cap_2 = '$ma_chi_muc_cap_2'"
;
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location:../cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=$ma_chi_muc_cap_1");
?>