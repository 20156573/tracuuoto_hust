<?php 
require_once '../connect.php';
$sql_chuong = "select * from chuong";
$array_chuong = mysqli_query($connect,$sql_chuong);
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>You</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    	<div class="container-fluid px-0">
	    	<div class="row px-0">
	    		<div class="col-md-2 left pr-0">
                    <div class="navbar-header py-3 px-2">
                        <a class="nav-link  navbar-brand font-weight-bold" href="index.php">My Admin</a>
                    </div>
                    <?php foreach ($array_chuong as $each): ?>
                    <div class="navbar py-0 px-0">
                        <button class="collapsible"><a class="nav-link navbar-toggle font-weight-bold text-dark" href="cau_truc.php?cau_truc=<?php echo('cau_truc_chuong') ?>&ma=<?php echo $each['ma_chuong'] ?> "><?php echo $each['ten_chuong'] ?></a></button> 
                        <?php  
                        $ma_chuong = $each["ma_chuong"];
                        $sql_chi_muc_cap_1= "select * from chi_muc_cap_1 where ma_chuong = '$ma_chuong'";
                        $array_chi_muc_cap_1 = mysqli_query($connect, $sql_chi_muc_cap_1);
                        ?>
                        <div class="py-0 pl-3 content">
                            <button class="add"><a class="nav-link text-dark" href="../admin/quan_ly_chi_muc_cap_1/view_insert.php?ma_chuong=<?php echo $ma_chuong ?>"><i class="fas fa-folder-plus"></i> Thêm</a></button> 

                            <?php foreach ($array_chi_muc_cap_1 as $key): ?> 
                            <button class="add"><a class="nav-link text-dark" href="cau_truc.php?cau_truc=cau_truc_chi_muc_cap_1&ma=<?php echo $key['ma_chi_muc_cap_1'] ?>"><?php echo $key['ten_chi_muc_cap_1'] ?></a>
                            </button>
                            <?php endforeach; ?> 
                        </div> 
                    </div>
                    <?php endforeach;
                    ?>
	    		</div>

                <script>
                var coll = document.getElementsByClassName("collapsible");
                var i;

                for (i = 0; i < coll.length; i++) {
                    coll[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var content = this.nextElementSibling;
                        if (content.style.maxHeight){
                            content.style.maxHeight = null;
                        } 
                        else {
                            content.style.maxHeight = content.scrollHeight + "px";
                        } 
                        });
                    }
                </script>