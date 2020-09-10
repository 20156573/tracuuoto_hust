<?php 
require_once 'menu.php';
$ma_chuong = $_GET['ma_chuong'];
$sql = "select * from chuong where ma_chuong = $ma_chuong";
$array = mysqli_query($connect,$sql);
$key = mysqli_fetch_array($array);

?>
<div class="col-md-10 right pr-0" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link cau_truc" href="../cau_truc.php?cau_truc=cau_truc_chuong&ma=<?php echo $key['ma_chuong'] ?>">Cấu trúc</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_insert.php?ma_chuong=<?php echo $key['ma_chuong'] ?>">Thêm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../cau_truc.php?cau_truc=cau_truc_chuong&ma=<?php echo $key['ma_chuong'] ?>"><i class="fas fa-angle-double-right"></i> Chương: <?php echo $key['ten_chuong'] ?></a>
            </li>
        </ul>
    </nav>
    <div class="body-right my-5 mx-5">
        <form class="" action="process_insert.php" method="POST">
            <div class="form-group row">
                <label for="chuong" class="col-sm-3 col-form-label">Chương</label>
                <div class="col-sm-9">
                    <?php foreach ($array as $each): ?>
                        <input type="hidden" name="ma_chuong"  value="<?php echo $each['ma_chuong'] ?>">
                        <input type="text" readonly class="form-control" id="ten_chuong" value="<?php echo $each['ten_chuong'] ?>">
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="ten_chi_muc_cap_1" class="col-sm-3 col-form-label">Tên chỉ mục cấp 1</label>
                <div  class="col-sm-9">
                    <input type="text" onkeyup="myFunction()" class="form-control" id="ten_chi_muc_cap_1" name="ten_chi_muc_cap_1">
                </div>
            </div>
            <button type="submit" class="btn btn-info" id="btn">Thêm</button>
    	</form>
    </div>
</div>
<script type="text/javascript">
        document.getElementById('btn').disabled = true;
        function myFunction()
        {
            var text = document.getElementById('ten_chi_muc_cap_1').value;

            if(text == '')
            {
               document.getElementById('btn').disabled = true;
            }
            else
            {
                document.getElementById('btn').disabled = false;
            }
       }
     
   </script>
