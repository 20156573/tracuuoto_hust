<?php 
require_once 'menu.php';
$ma_chuong = $_GET['ma_chuong'];
$ma_chi_muc_cap_1 = $_GET['ma_chi_muc_cap_1'];

$sql = "select chuong.ten_chuong, chi_muc_cap_1.ma_chi_muc_cap_1, chi_muc_cap_1.ten_chi_muc_cap_1 from chi_muc_cap_1 join chuong on chuong.ma_chuong = chi_muc_cap_1.ma_chuong where chuong.ma_chuong = $ma_chuong and ma_chi_muc_cap_1 = $ma_chi_muc_cap_1";
$array = mysqli_query($connect,$sql);
$key = mysqli_fetch_array($array);

?>
<div class="col-md-10 right pr-0" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=<?php echo $key['ma_chi_muc_cap_1'] ?>">Cấu trúc</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_insert.php?ma_chuong=<?php echo $key['ma_chuong']?>&ma_chi_muc_cap_1=<?php echo $key['ma_chi_muc_cap_1']?> ">Thêm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../cau_truc.php?cau_truc=cau_truc_chuong&ma=<?php echo $ma_chuong ?>"><i class="fas fa-angle-double-right"></i> <?php echo $key['ten_chuong'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=<?php echo $key['ma_chi_muc_cap_1'] ?>"><i class="fas fa-angle-right"></i> <?php echo $key['ten_chi_muc_cap_1'] ?></a>
            </li>
        </ul>
    </nav>
    <div class="body-right my-5 mx-5">
        <form class="" action="process_insert.php" method="POST">
            <div class="form-group row">
                <label for="chuong" class="col-sm-3 col-form-label">Chương</label>
                <div class="col-sm-9">
                    <?php foreach ($array as $each): ?>
                        <input type="hidden" name="ma_chi_muc_cap_1"  value="<?php echo $each['ma_chi_muc_cap_1'] ?>">
                        <input type="text" readonly class="form-control" id="ten_chi_muc_cap_1" value="<?php echo $each['ten_chuong'] ?>">
                </div>
                <label for="chi_muc_cap_1" class="col-sm-3 col-form-label">Chỉ mục cấp 1</label>
                <div class="col-sm-9">
                        <input type="hidden" name="ma_chi_muc_cap_1"  value="<?php echo $each['ma_chi_muc_cap_1'] ?>">
                        <input type="text" readonly class="form-control" id="ten_chi_muc_cap_1" value="<?php echo $each['ten_chi_muc_cap_1'] ?>">
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="ten_chi_muc_cap_2" class="col-sm-3 col-form-label">Tên chỉ mục cấp 2</label>
                <div  class="col-sm-9">
                    <input type="text" onkeyup="myFunction()" class="form-control" id="ten_chi_muc_cap_2" name="ten_chi_muc_cap_2">
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
