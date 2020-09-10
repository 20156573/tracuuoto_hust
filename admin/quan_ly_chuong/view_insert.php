<?php 
// require_once '../check_admin.php';
// require_once '../menu.php';
?>

<article class="content container">
    <div class="col-sm-10">
        <div class="you-right mx-5 pb-4">
            <h5 class="pt-4 pb-2 px-4">Thêm chương</h5>
            <hr>
            <form class="px-4" action="process_insert.php" method="POST">
                <div class="form-group row">
                    <label for="ten_chuong" class="col-sm-2 col-form-label">Tên chương<i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                    <input type="text" class="form-control col-sm-7" id="ten_chuong" name="ten_chuong" onkeyup="myfunction()">
                    <label id="a_ten_chuong" class="col-sm-5"></label>
                    </div>
                </div>
                 <button type="submit" class="btn btn-info" id="btn">Thêm</button>
			</form>
		</div>
	</div>
</article>  

<!-- <?php require_once '../footer.php'; ?> -->