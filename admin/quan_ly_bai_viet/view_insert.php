<?php 
require_once 'menu.php';
$ma_chi_muc_cap_2 = $_GET['ma_chi_muc_cap_2'];
$ma_chi_muc_cap_1 = $_GET['ma_chi_muc_cap_1'];

$sql = "select
    chuong.ten_chuong,
    chuong.ma_chuong,
    chi_muc_cap_1.ten_chi_muc_cap_1,
    chi_muc_cap_2.ten_chi_muc_cap_2,
    chi_muc_cap_2.ma_chi_muc_cap_2,
    chi_muc_cap_1.ma_chi_muc_cap_1
FROM
    chi_muc_cap_2
JOIN chi_muc_cap_1 ON chi_muc_cap_1.ma_chi_muc_cap_1 = chi_muc_cap_2.ma_chi_muc_cap_1
JOIN chuong ON chuong.ma_chuong = chi_muc_cap_1.ma_chuong
WHERE
    ma_chi_muc_cap_2 = $ma_chi_muc_cap_2 AND chi_muc_cap_1.ma_chi_muc_cap_1 = $ma_chi_muc_cap_1";
$array = mysqli_query($connect,$sql);
$key = mysqli_fetch_array($array);

?>
<div class="col-md-10 right pr-0" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../cau_truc.php?cau_truc=bai_dang&ma=<?php echo $key['ma_chi_muc_cap_2'] ?>">Cấu trúc</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_insert.php?ma_chi_muc_cap_1=<?php echo $key['ma_chi_muc_cap_1']?>&ma_chi_muc_cap_2=<?php echo $key['ma_chi_muc_cap_2']?> ">Thêm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link float-left" href="../cau_truc.php?cau_truc=cau_truc_chuong&ma=<?php echo   $key['ma_chuong'] ?>"><i class="fas fa-angle-double-right"></i> <?php echo $key['ten_chuong'] ?></a>
                <a class="nav-link float-left" href="../cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=<?php echo $ma_chi_muc_cap_1 ?>"><i class="fas fa-angle-double-right"></i> <?php echo $key['ten_chi_muc_cap_1'] ?></a>
                <a class="nav-link float-right" href="../cau_truc.php?cau_truc=cau_truc_chi_muc_cap_2&ma=<?php echo $ma_chi_muc_cap_2 ?>"><i class="fas fa-angle-right"></i> <?php echo $key['ten_chi_muc_cap_2'] ?></a>
            </li>
        </ul>
    </nav>
    <div class="body-right my-5 mx-5">
        <form class="" action="process_insert.php" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="chuong" class="col-sm-3 col-form-label">Chương</label>
                <div class="col-sm-9">
                    <?php foreach ($array as $each): ?>
                    <input type="hidden" name="ma_chi_muc_cap_1"  value="<?php echo $each['ma_chi_muc_cap_1'] ?>">
                    <input type="text" readonly class="form-control" id="chuong" value="<?php echo $each['ten_chuong'] ?>">
                </div>
                <label for="chi_muc_cap_1" class="col-sm-3 col-form-label">Chỉ mục cấp 1</label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control" id="ten_chi_muc_cap_1" value="<?php echo $each['ten_chi_muc_cap_1'] ?>">
                </div>
                <label for="ten_chi_muc_cap_2" class="col-sm-3 col-form-label">Chỉ mục cấp 2</label>
                <div class="col-sm-9">
                    <input type="hidden" name="ma_chi_muc_cap_2"  value="<?php echo $each['ma_chi_muc_cap_2'] ?>">
                    <input type="text" readonly class="form-control" id="ten_chi_muc_cap_2" value="<?php echo $each['ten_chi_muc_cap_2'] ?>">
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tieu_de" class="col-sm-3 col-form-label">Tiêu đề</label>
                <div  class="col-sm-9">
                    <input type="text" onkeyup="myFunction()" class="form-control" id="tieu_de" name="tieu_de">
                </div>
                <label for="tom_tat" class="col-sm-3 col-form-label">Tóm tắt</label>
                <div  class="col-sm-9">
                    <input type="text" onkeyup="myFunction()" class="form-control" id="tom_tat" name="tom_tat">
                </div>
                <label for="noi_dung" class="col-sm-3 col-form-label">Nội dung</label>
                <div  class="col-sm-9">
                    <textarea rows="20" onkeyup="myFunction()" class="form-control" id="noi_dung" name="noi_dung"></textarea>
                </div>

                <label for="image" class="col-sm-3 col-form-label">Ảnh</label>
                <div  class="col-sm-9">
                   <input type="file" id="image" name="image" accept="image/*">
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
            var tieu_de = document.getElementById('tieu_de').value;
            var tom_tat = document.getElementById('tom_tat').value;
            var noi_dung = document.getElementById('noi_dung').value;

            if(tieu_de == '' || tom_tat == '' || noi_dung == '')
            {
               document.getElementById('btn').disabled = true;
            }
            else
            {
                document.getElementById('btn').disabled = false;
            }
       }
     
   </script>