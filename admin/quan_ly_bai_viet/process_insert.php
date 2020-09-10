<?php 

$ma_chi_muc_cap_1			= $_POST['ma_chi_muc_cap_1'];
$ma_chi_muc_cap_2 	= $_POST['ma_chi_muc_cap_2'];
$tieu_de 	= $_POST['tieu_de'];
$tom_tat = $_POST['tom_tat'];
$noi_dung = $_POST['noi_dung'];

if (isset($_FILES['image'])) {
	$image 			= $_FILES['image'];
	if ($image['size']==0) {
		$imageName = '';
	}
	else{
		$array    			= explode('/', $image['type']);
		$file_type 			= $array[1];
		$imageName   		= strtotime("now").".$file_type";
		$target_dir 		= "../../anh/";
		$target_file 		= $target_dir . $imageName;
		move_uploaded_file($image["tmp_name"], $target_file);
	}
	
}


require_once '../../connect.php';
$sql = "insert into bai_dang (ma_chi_muc_cap_1, ma_chi_muc_cap_2, tieu_de, tom_tat, noi_dung, anh) values ('$ma_chi_muc_cap_1', '$ma_chi_muc_cap_2', '$tieu_de', '$tom_tat', '$noi_dung', '$imageName')";

mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: ../cau_truc.php?cau_truc=bai_dang&ma=$ma_chi_muc_cap_2");
?>