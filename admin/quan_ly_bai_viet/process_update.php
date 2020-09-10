<?php 

$ma_chi_muc_cap_2 = $_POST['ma_chi_muc_cap_2'];
$ma_bai_dang = $_POST['ma_bai_dang'];
$tieu_de 	= $_POST['tieu_de'];
$tom_tat = $_POST['tom_tat'];
$noi_dung = $_POST['noi_dung'];
require_once '../../connect.php';

$anh_moi = $_FILES['anh_moi'];

if ($anh_moi['size']==0) {
	$anh = $_POST['anh_cu'];
}
else{
	$array		= explode('/', $anh_moi['type']);
	$file_type	= $array[1];
	$anh    = strtotime('now').".$file_type";

	$target_dir 	= "../../anh/";
	$target_file 	= $target_dir . $anh;
	move_uploaded_file($anh_moi["tmp_name"], $target_file);

}
$sql = "update bai_dang
set
tieu_de = '$tieu_de',
tom_tat = '$tom_tat',
noi_dung = '$noi_dung',
anh = '$anh'
where ma_bai_dang = '$ma_bai_dang'"
;	
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location:../cau_truc.php?cau_truc=bai_dang&ma=$ma_chi_muc_cap_2");
?>