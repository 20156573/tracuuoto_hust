<?php 
require_once 'menu.php';
$sql_cau_truc = "select * from chuong";
$array_cau_truc = mysqli_query($connect, $sql_cau_truc);
?>
			<div class="col-md-10 right pr-0" >
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link cau_truc" href="index.php">Cấu trúc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fas fa-angle-double-right"></i> Tất cả các chương</a>
                        </li>
                    </ul>
                </nav>
                <table class="table table-striped table-hover">
  					<thead>
    					<tr>
      						<th scope="col">Chương</th>
      						<th scope="col">Hành động</th>
    					</tr>
  					</thead>
  					<tbody>
  						<?php foreach ($array_cau_truc as $each): ?>
    					<tr>
      						<th scope="row"><a class="text-dark" href="cau_truc.php?cau_truc=<?php echo('cau_truc_chuong') ?>&ma=<?php echo $each['ma_chuong'] ?>"><?php echo $each['ten_chuong'] ?></a></th>
      						<td>
      							<a class="text-dark" href="cau_truc.php?cau_truc=<?php echo('cau_truc_chuong') ?>&ma=<?php echo $each['ma_chuong'] ?>"><i style="color: green" class="far fa-eye"></i> Cấu trúc</a>
      							<a class="text-dark" href="../admin/quan_ly_chuong/view_update.php?ma_chuong=<?php echo $each['ma_chuong'] ?>"><i style="color: blue" class="fas fa-wrench"></i> Sửa</a>
                    <a class="text-dark" href="delete.php?xoa=xoa_chuong&ma_chuong=<?php echo  $each['ma_chuong'] ?>"><i style="color: red" class="far fa-trash-alt"></i> Xóa</a>
      						</td>
    					</tr>
    					<?php endforeach;
						mysqli_close($connect); 
						?>
		  			</tbody>
				</table>			
            </div>
    	</div>
	</div>
</body>
<?php 
require_once 'footer.php';
?>