<?php
require_once 'menu.php';
?>
<?php 
if (!isset($_GET['cau_truc']) && !isset($_GET['ma'])) {
    header('location: index.php');
}
$cau_truc = $_GET['cau_truc'];
$ma = $_GET['ma'];
?>
<?php if ($cau_truc == 'cau_truc_chuong') { ?>
<?php 
$sql_plus  = "select ten_chuong from chuong where ma_chuong = $ma";
$array_plus = mysqli_query($connect, $sql_plus);
$key_plus = mysqli_fetch_array($array_plus);
$sql_cau_truc = "select * from chi_muc_cap_1 join chuong on chuong.ma_chuong = chi_muc_cap_1.ma_chuong where chi_muc_cap_1.ma_chuong = $ma";
$array_cau_truc = mysqli_query($connect, $sql_cau_truc);
$key = mysqli_fetch_array($array_cau_truc);
?>
			<div class="col-md-10 right pr-0" >
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="cau_truc.php?cau_truc=cau_truc_chuong&ma=<?php echo $key['ma_chuong'] ?>">Cấu trúc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/quan_ly_chi_muc_cap_1/view_insert.php?ma_chuong=<?php echo $ma ?>">Thêm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cau_truc.php?cau_truc=cau_truc_chuong&ma=<?php echo $key['ma_chuong'] ?>"><i class="fas fa-angle-double-right"></i> Chương: <?php echo $key_plus['ten_chuong'] ?></a>
                        </li>
                    </ul>
                </nav>
                <table class="table table-striped table-hover">
  					<thead>
    					<tr>
      						<td scope="col">Chỉ mục cấp 1</td>
      						<td scope="col">Hành động</td>
    					</tr>
  					</thead>
  					<tbody>
  						<?php foreach ($array_cau_truc as $each): ?>
    					<tr>
      						<td scope="row"><a class="text-dark" href="cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=<?php echo $each['ma_chi_muc_cap_1'] ?>"><?php echo $each['ten_chi_muc_cap_1'] ?></a></td>
      						<td>
      							<a class="text-dark" href="cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=<?php echo $each['ma_chi_muc_cap_1'] ?>"><i style="color: green" class="far fa-eye"></i> Cấu trúc</a>
      							<a class="text-dark" href="../admin/quan_ly_chi_muc_cap_1/view_update.php?ma_chi_muc_cap_1=<?php echo $each['ma_chi_muc_cap_1'] ?>"><i style="color: blue" class="fas fa-wrench"></i> Sửa</a>
      							<a class="text-dark" href="delete.php?xoa=xoa_chi_muc_cap_1&ma_tro_lai=<?php echo $ma ?>&ma_chi_muc_cap_1=<?php echo  $each['ma_chi_muc_cap_1'] ?>"><i style="color: red" class="far fa-trash-alt"></i> Xóa</a>
      						</td>
    					</tr>
    					<?php endforeach;
						  mysqli_close($connect); 
						  ?>
		  			</tbody>
		  		  </table>
            </div>
<?php } ?>  

<?php if ($cau_truc == 'cau_truc_chi_muc_cap_1') { ?>
<?php 
$sql_plus = "select chuong.ten_chuong, chuong.ma_chuong, chi_muc_cap_1.ma_chi_muc_cap_1, ten_chi_muc_cap_1 from chi_muc_cap_1 join chuong on chuong.ma_chuong = chi_muc_cap_1.ma_chuong where ma_chi_muc_cap_1 = $ma";
$array_plus = mysqli_query($connect, $sql_plus);
$key_plus = mysqli_fetch_array($array_plus);
$sql_cau_truc = "select ma_chi_muc_cap_2, chi_muc_cap_1.ma_chi_muc_cap_1, ten_chi_muc_cap_2 from chi_muc_cap_2 join chi_muc_cap_1 on chi_muc_cap_1.ma_chi_muc_cap_1 = chi_muc_cap_2.ma_chi_muc_cap_1 where chi_muc_cap_1.ma_chi_muc_cap_1 = $ma";
$array_cau_truc = mysqli_query($connect, $sql_cau_truc);
$key = mysqli_fetch_array($array_cau_truc);
?>
			<div class="col-md-10 right pr-0" >
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link cau_truc" href="cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=<?php echo $key_plus['ma_chi_muc_cap_1'] ?>">Cấu trúc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/quan_ly_chi_muc_cap_2/view_insert.php?ma_chuong=<?php echo $key_plus['ma_chuong']?>&ma_chi_muc_cap_1=<?php echo $key_plus['ma_chi_muc_cap_1']?> ">Thêm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link float-left" href="cau_truc.php?cau_truc=cau_truc_chuong&ma=<?php echo $key_plus['ma_chuong'] ?>"><i class="fas fa-angle-double-right"></i> <?php echo $key_plus['ten_chuong'] ?></a>
                            <a class="nav-link float-right" href="cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=<?php echo $key_plus['ma_chi_muc_cap_1'] ?>"><i class="fas fa-angle-right"></i> <?php echo $key_plus['ten_chi_muc_cap_1'] ?></a>                           
                        </li>
                    </ul>
                </nav>
                <table class="table table-striped table-hover">
  					<thead>
    					<tr>
      						<td scope="col">Chỉ mục cấp 2</td>
      						<td scope="col">Hành động</td>
    					</tr>
  					</thead>
  					<tbody>
  						<?php foreach ($array_cau_truc as $each): ?>
    					<tr>
      						<td scope="row"><a class='text-dark' href="cau_truc.php?cau_truc=bai_dang&ma=<?php echo $each['ma_chi_muc_cap_2'] ?>"><?php echo $each['ten_chi_muc_cap_2'] ?></a></td>
      						<td>
      							<a class="text-dark" href="cau_truc.php?cau_truc=bai_dang&ma=<?php echo $each['ma_chi_muc_cap_2'] ?>"><i style="color: green" class="far fa-eye"></i> Bài đăng</a>
      							<a class="text-dark" href="../admin/quan_ly_chi_muc_cap_2/view_update.php?ma_chi_muc_cap_2=<?php echo $each['ma_chi_muc_cap_2'] ?>"><i style="color: blue" class="fas fa-wrench"></i> Sửa</a>
      							<a class="text-dark" href="delete.php?xoa=xoa_chi_muc_cap_2&ma_tro_lai=<?php echo $ma ?>&ma_chi_muc_cap_2=<?php echo  $each['ma_chi_muc_cap_2'] ?>"><i style="color: red" class="far fa-trash-alt"></i> Xóa</a>
      						</td>
    					</tr>
    					<?php endforeach;
						mysqli_close($connect); 
						?>
		  			</tbody>
		  		</table>
            </div>
<?php } ?>



<?php if ($cau_truc == 'bai_dang') { ?>
<?php 
$sql_plus = "select chuong.ten_chuong, chuong.ma_chuong, chi_muc_cap_1.ma_chi_muc_cap_1, chi_muc_cap_1.ten_chi_muc_cap_1, chi_muc_cap_2.ma_chi_muc_cap_2, chi_muc_cap_2.ten_chi_muc_cap_2 from chi_muc_cap_2 join chi_muc_cap_1 on chi_muc_cap_1.ma_chi_muc_cap_1 = chi_muc_cap_2.ma_chi_muc_cap_1 JOIN chuong on chuong.ma_chuong = chi_muc_cap_1.ma_chuong where ma_chi_muc_cap_2 = $ma";
$array_plus = mysqli_query($connect, $sql_plus);
$key_plus = mysqli_fetch_array($array_plus);
$sql_cau_truc = "select ma_bai_dang, tieu_de, tom_tat, noi_dung, anh from bai_dang where bai_dang.ma_chi_muc_cap_2 = $ma"; 
$array_cau_truc = mysqli_query($connect, $sql_cau_truc);
$key = mysqli_fetch_array($array_cau_truc);
?>
    <div class="col-md-10 right pr-0" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link cau_truc" href="#">Cấu trúc</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/quan_ly_bai_viet/view_insert.php?ma_chi_muc_cap_1=<?php echo $key_plus['ma_chi_muc_cap_1']?>&ma_chi_muc_cap_2=<?php echo $key_plus['ma_chi_muc_cap_2']?> ">Thêm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link float-left" href="cau_truc.php?cau_truc=cau_truc_chuong&ma=<?php echo   $key_plus['ma_chuong'] ?>"><i class="fas fa-angle-double-right"></i> <?php echo $key_plus['ten_chuong'] ?></a>
                    <a class="nav-link float-left" href="cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=<?php echo $key_plus['ma_chi_muc_cap_1'] ?>"><i class="fas fa-angle-right"></i> <?php echo $key_plus['ten_chi_muc_cap_1'] ?></a>   
                    <a class="nav-link float-right" href="cau_truc.php?cau_truc=bai_dang&ma=<?php echo $key_plus['ma_bai_dang'] ?>"><i class="fas fa-angle-right"></i> <?php echo $key_plus['ten_chi_muc_cap_2'] ?></a>                         
                </li>
            </ul>
        </nav>
        <div class="bai_dang container container-fluid jumbotron jumbotron-fluid">
            <?php foreach ($array_cau_truc as $each): ?>
            <a class="text-dark nav-link float-left mx-5" href="../admin/quan_ly_bai_viet/view_update.php?ma_bai_dang=<?php echo $each['ma_bai_dang'] ?>"><i style="color: blue" class="fas fa-wrench"></i> Sửa</a>
            <a class="text-dark float-right nav-link" href="delete.php?xoa=xoa_bai_dang&ma_tro_lai=<?php echo $ma ?>&ma_bai_dang=<?php echo  $each['ma_bai_dang'] ?>"><i style="color: red" class="far fa-trash-alt"></i> Xóa</a>
            <h1 class="text-center mt-5 mb-2 mx-5"><?php echo $each['tieu_de'] ?></h1>
            <h4 class="mt-5 mb-2 mx-5 lead"><?php echo $each['tom_tat'] ?></h4>
            <?php if ($each['anh'] != NULL): ?>
              <div class="text-center"><img class=" img-fluid mt-2" src="../anh/<?php echo $each['anh'] ?>"></div>
            <?php endif ?>            
            <p class="mt-5 mb-2 mx-5"><?php echo $each['noi_dung'] ?></p>
            <?php endforeach;
        mysqli_close($connect); 
      ?>
        </div>

      <?php } ?>

  </div>
  </div>
  </body>

  <?php 
  require_once 'footer.php';
  ?>