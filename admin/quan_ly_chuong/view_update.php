<?php 
require_once 'menu.php';

$ma_chuong = $_GET['ma_chuong'];
$sql = "select * from chuong where ma_chuong = '$ma_chuong'";
$array = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($array);
?>
<div class="col-md-10 right pr-0" > 
    <div class="body-right my-5 mx-5">
        <form class="" action="process_update.php" method="POST">
            <div class="form-group row">
                <label for="chuong" class="col-sm-3 col-form-label">Chương</label>
                <div class="col-sm-9">
                    <?php foreach ($array as $each): ?>
                        <input type="hidden" name="ma_chuong"  value="<?php echo $each['ma_chuong'] ?>">
                        <input type="text"  class="form-control" name="ten_chuong" value="<?php echo $each['ten_chuong'] ?>">
                    <?php endforeach; ?>
                </div>
            </div>
            <button type="submit" class="btn btn-info" id="btn">Cập nhật</button>
        </form>
    </div>
</div>
