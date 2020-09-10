<?php 
require_once '../connect.php';
$xoa = $_GET['xoa'];
if (isset($_GET['ma_bai_dang'])) {
	$ma_bai_dang = $_GET['ma_bai_dang'];
}
if (isset($_GET['ma_chi_muc_cap_2'])) {
	$ma_chi_muc_cap_2 = $_GET['ma_chi_muc_cap_2'];
}
if (isset($_GET['ma_chi_muc_cap_1'])) {
	$ma_chi_muc_cap_1 = $_GET['ma_chi_muc_cap_1'];
}
if (isset($_GET['ma_tro_lai'])) {
	$ma_tro_lai = $_GET['ma_tro_lai'];
}
if (isset($_GET['ma_chuong'])) {
	$ma_chuong = $_GET['ma_chuong'];
}

switch ($xoa) {
	case 'xoa_bai_dang':
		$sql = "delete from bai_dang
		where ma_bai_dang = $ma_bai_dang";
		mysqli_query($connect, $sql);
		header("location: cau_truc.php?cau_truc=bai_dang&ma=$ma_tro_lai");
		break;
	case 'xoa_chi_muc_cap_2':
		$sql_xoa_bai_dang = "delete from bai_dang
		where ma_chi_muc_cap_2 = $ma_chi_muc_cap_2";
		mysqli_query($connect, $sql_xoa_bai_dang);
		$sql_xoa_chi_muc_cap_2 = "delete from chi_muc_cap_2
		where ma_chi_muc_cap_2 = $ma_chi_muc_cap_2";
		mysqli_query($connect, $sql_xoa_chi_muc_cap_2);

		header("location: cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=$ma_tro_lai");
		break;
	case 'xoa_chi_muc_cap_1':
		$sql_xoa_bai_dang = "delete from bai_dang where ma_bai_dang in(select ma_bai_dang from bai_dang where ma_chi_muc_cap_2 in (select ma_chi_muc_cap_2 from chi_muc_cap_2 where ma_chi_muc_cap_1 = $ma_chi_muc_cap_1))";
		mysqli_query($connect, $sql_xoa_bai_dang);
		$sql_xoa_chi_muc_cap_2 = "delete from chi_muc_cap_2 where ma_chi_muc_cap_1 = $ma_chi_muc_cap_1";
		mysqli_query($connect, $sql_xoa_chi_muc_cap_2);
		$sql_xoa_chi_muc_cap_1 = "delete from chi_muc_cap_1 where ma_chi_muc_cap_1 = $ma_chi_muc_cap_1";
		mysqli_query($connect, $sql_xoa_chi_muc_cap_1);
		header("location: cau_truc.php?cau_truc=cau_truc_chuong&ma=$ma_tro_lai");
		break;
	case 'xoa_chuong':
		$sql_xoa_bai_dang = "delete from bai_dang where ma_bai_dang in(select ma_bai_dang from bai_dang where ma_chi_muc_cap_2 in (select ma_chi_muc_cap_2 from chi_muc_cap_2 where ma_chi_muc_cap_1 in (select ma_chi_muc_cap_1 from chi_muc_cap_1 where ma_chuong = $ma_chuong)))";
		mysqli_query($connect, $sql_xoa_bai_dang);
		$sql_xoa_chi_muc_cap_2 = "delete from chi_muc_cap_2 where ma_chi_muc_cap_1 in (select ma_chi_muc_cap_1 from chi_muc_cap_1 where ma_chuong = $ma_chuong)";
		mysqli_query($connect, $sql_xoa_chi_muc_cap_2);

		$sql_xoa_chi_muc_cap_1 = "delete from chi_muc_cap_1 where ma_chuong = $ma_chuong";
		mysqli_query($connect, $sql_xoa_chi_muc_cap_1);
		$sql_xoa_chuong = "delete from chuong where ma_chuong = $ma_chuong";
		mysqli_query($connect, $sql_xoa_chuong);
		header("location: index.php");
		break;
	default:
		header('location: index.php');
		break;
}
mysqli_close($connect);
?>