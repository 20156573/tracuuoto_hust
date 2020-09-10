<?php 
require_once 'menu.php';

$ma_chi_muc_cap_1 = $_GET['ma_chi_muc_cap_1'];
$sql = "select *, chuong.ma_chuong, chuong.ten_chuong from chi_muc_cap_1 join chuong on chuong.ma_chuong = chi_muc_cap_1.ma_chuong where ma_chi_muc_cap_1 = $ma_chi_muc_cap_1";
$array = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($array);
?>

<div class="col-md-10 right pr-0" > 
    <div class="body-right my-5 mx-5">
        <form class="" action="process_update.php" method="POST">
            <div class="form-group row">
                <?php foreach ($array as $each): ?>
                <label for="chuong" class="col-sm-3 col-form-label">Chương</label>
                <div class="col-sm-9">
                        <input type="text" readonly class="form-control" id="chuong" value="<?php echo $each['ten_chuong'] ?>">
                        <input type="hidden" name="ma_chuong"  value="<?php echo $each['ma_chuong'] ?>">
                        <input type="hidden" name="ma_chi_muc_cap_1"  value="<?php echo $each['ma_chi_muc_cap_1'] ?>">                  
                </div>
                <label for="chi_muc_cap_1" class="col-sm-3 col-form-label">Chỉ mục cấp 1</label>
                <div class="col-sm-9">
                        <input type="text"  class="form-control" id="chi_muc_cap_1" name="ten_chi_muc_cap_1" value="<?php echo $each['ten_chi_muc_cap_1'] ?>">                   
                </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-info" id="btn">Cập nhật</button>
        </form>
    </div>
</div>
