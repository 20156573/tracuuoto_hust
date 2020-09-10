<?php 
require_once 'menu.php';

$ma_bai_dang = $_GET['ma_bai_dang'];
$sql = "select ma_bai_dang, ma_chi_muc_cap_2, tieu_de, tom_tat, noi_dung, anh from bai_dang where ma_bai_dang = $ma_bai_dang";
$array = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($array);
?>

<div class="col-md-10 right pr-0" > 
    <div class="body-right my-5 mx-5">
        <form class="" action="process_update.php" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <?php foreach ($array as $each): ?>
                <label for="tieu_de" class="col-sm-3 my-2 col-form-label">Tiêu đề</label>
                <div  class="col-sm-9">
                    <input type="hidden" class="form-control" id="tieu_de" name="ma_bai_dang" value="<?php echo $each['ma_bai_dang'] ?>">
                    <input type="hidden" class="form-control" id="tieu_de" name="ma_chi_muc_cap_2" value="<?php echo $each['ma_chi_muc_cap_2'] ?>">
                    <input type="text" class="form-control" id="tieu_de" name="tieu_de" value="<?php echo $each['tieu_de'] ?>">
                </div>

                <label for="tom_tat" class="col-sm-3 my-2 col-form-label">Tóm tắt</label>
                <div  class="col-sm-9">
                    <input type="text" class="form-control" id="tom_tat" name="tom_tat" value="<?php echo $each['tom_tat'] ?>">
                </div>

                <label for="noi_dung" class="col-sm-3 my-2 col-form-label">Nội dung</label>
                <div  class="col-sm-9">
                    <textarea rows="20" class="form-control" id="noi_dung" name="noi_dung"><?php echo $each['noi_dung'] ?></textarea>
                </div>

                <label for="anh_cu" class="col-sm-2 my-2 col-form-label">Ảnh cũ <i class="fas fa-pen"></i></label>
                <div  class="col-sm-10 my-3">
                    <img src="../../anh/<?php echo($each['anh']) ?>" height='200'>
                    <input type="hidden" id="anh_cu" name="anh_cu" value="<?php echo $each['anh'] ?>">
                </div>

                <label for="anh_moi" class="col-sm-2 my-2 col-form-label">Chọn ảnh mới <i class="fas fa-pen"></i></label>
                <div  class="col-sm-10">
                   <input type="file" id="anh_moi" name="anh_moi" accept="image/*">
                </div>

                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-info" id="btn">Cập nhật</button>
        </form>
    </div>
</div>
