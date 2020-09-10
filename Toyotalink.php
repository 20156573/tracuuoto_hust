<?php 
require_once 'connect.php';
if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}
if (isset($_GET['ma_link'])) {
    $ma_link = $_GET['ma_link'];
}
if (isset($_GET['ten'])) {
    $ten = $_GET['ten'];
}
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
$sql_chuong = "select * from chuong";
$array_chuong = mysqli_query($connect,$sql_chuong);
$search = '';
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql_bai_dang = "select * from bai_dang where tieu_de like '%$search%'";
}
else if ($ma == 'linkchuong') {
    $sql_bai_dang = "select *, chuong.ten_chuong from bai_dang join chi_muc_cap_2 on chi_muc_cap_2.ma_chi_muc_cap_2 = bai_dang.ma_chi_muc_cap_2 join chi_muc_cap_1 on chi_muc_cap_1.ma_chi_muc_cap_1 = chi_muc_cap_2.ma_chi_muc_cap_1 join chuong on chuong.ma_chuong = chi_muc_cap_1.ma_chuong where chuong.ma_chuong = $ma_link";
}
else if ($ma == 'link_chi_muc_cap_1') {
    $sql_bai_dang = "select *, chi_muc_cap_1.ten_chi_muc_cap_1 from bai_dang join chi_muc_cap_2 on chi_muc_cap_2.ma_chi_muc_cap_2 = bai_dang.ma_chi_muc_cap_2 join chi_muc_cap_1 on chi_muc_cap_1.ma_chi_muc_cap_1 = chi_muc_cap_2.ma_chi_muc_cap_1 where chi_muc_cap_1.ma_chi_muc_cap_1 = $ma_link";
}
$array_bai_dang = mysqli_query($connect,$sql_bai_dang);

$allOfGame = mysqli_num_rows($array_bai_dang);

$limit = 8;

$currentPage = 1;

if(isset($_GET['page'])){
$currentPage = $_GET['page'];
}
$offset = ($currentPage - 1) * $limit;

$numberOfPages = ceil($allOfGame/$limit);

$sql = "$sql_bai_dang
limit $limit offset $offset";

$array = mysqli_query($connect,$sql);
$count = mysqli_num_rows($array);

?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>DS</title>
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
    <div class="container-fluid  header bg-white fixed-top">
        <div class="row">
            <div class="col-md-2">
                <nav class="ml-4 navbar">
                    <a class="" href="index.php"><img id="logo" src="logo.png"></a>
                </nav>
            </div>
            <div class="col-md-10">
                <nav class="p-0 m-0 navbar navbar-expand-lg navbar-white bg-white sticky-top">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mx-0 mt-4" id="navbarNav">
                        <ul class="navbar-nav container">
                            <li class="nav-item dropdown active ml-5 mr-4">
                                <a class="nav-link dropbtn" href="index.php">TRANG CHỦ<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mx-4 dropdown">
                                <a id="cacdongxe" class="nav-link dropbtn active" href="#">CÁC DÒNG XE</a>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="Toyota.php">TOYOTA CAMRY 2015</a>
                                    <a class="dropdown-item" href="error.php">AUDI A3 2015</a>
                                    <a class="dropdown-item" href="error.php">HONDA ACCORD 2015</a>
                                    <a class="dropdown-item" href="error.php">BMW 118i 2015</a>
                                    <a class="dropdown-item" href="error.php">HUYNDAI SONATA 2015</a>
                                    <a class="dropdown-item" href="error.php">MERCEDES BENZC200 2015</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div> 
    </div>
    <div class="container-fluid body">   
        <div class="row">
            <div class="col-md-2 bodyleft bg-white">   
                <a class="nav-link font-weight-bold Toyota" href="Toyota.php">TOYOTA CAMRY 2015</a> 
                <?php foreach ($array_chuong as $each): ?>
                <div class="mb-4">
                    <a class="nav-link font-weight-bold text-hover tenchuong text-uppercase" href="Toyotalink.php?ma=linkchuong&ma_link=<?php echo $each['ma_chuong'] ?>&ten=<?php echo $each['ten_chuong'] ?>"><?php echo $each['ten_chuong'] ?></a>
                    <?php 
                    $ma_chuong = $each["ma_chuong"];
                    $sql_chi_muc_cap_1= "select * from chi_muc_cap_1 where ma_chuong = '$ma_chuong'";
                    $array_chi_muc_cap_1 = mysqli_query($connect, $sql_chi_muc_cap_1);
                    ?>
                    <?php foreach ($array_chi_muc_cap_1 as $key): ?> 
                    <a class="my-0 py-1 nav-link text-hover" href="Toyotalink.php?ma=link_chi_muc_cap_1&ma_link=<?php echo $key['ma_chi_muc_cap_1'] ?>&ten=<?php echo $key['ten_chi_muc_cap_1'] ?>"><?php echo $key['ten_chi_muc_cap_1'] ?></a>
                    <?php endforeach; ?> 
                </div><?php endforeach; ?> 
            </div> 
            <div class="col-md-7 px-0 pb-5 bodycenter"> 
                <img class="img-fluid mt-5 pt-2" src="ToyotaCamry2015.jpg">

                <?php if (!isset($_GET['search'])): ?>
                    <p class="ml-5 mt-4 text-uppercase mr-5 pl-5 pr-5 tieudebaidang"><?php echo $ten ?></p>
                <?php endif ?>

                <?php if (isset($_GET['search'])): ?>
                    <p class="ml-5 mt-5 mr-5 pl-5 pr-5 tieudebaidang">Tìm kiếm cho <?php echo $_GET['search'] ?></p>
                <?php endif ?>

                <?php if($count==0): ?> 
                <div class="">
                    <p class="ml-5 mt-4 mr-5 pl-5 pr-5" style="color:  #007bff;">Không bài đăng nào phù hợp, bạn vui lòng tím kiếm bằng các từ khóa khác</p>
                </div>
                <?php endif ?>  

                <?php if ($count > '0'): ?>
                <?php foreach ($array_bai_dang as $each): ?>                   
                <div class="ml-5 mt-2 mr-5 pl-5 pr-5">
                    <a class="nav-link pl-0 tieudebaidang text-hover display-5" href="bai_dang.php?ma_bai_dang=<?php echo $each['ma_bai_dang'] ?>"><h2 class="mt-5"><?php echo $each['tieu_de'] ?></h2></a>
                    <p class="mt-1"><?php echo $each['tom_tat'] ?></p>
                    <a class="" href="bai_dang.php?ma_bai_dang=<?php echo $each['ma_bai_dang'] ?>"><i class="fas fa-hand-point-right"> </i>Tiếp tục đọc</a>
                </div>
                <?php endforeach; ?>
                <div class="btn-group ml-5 pl-5 pt-5" role="group" aria-label="First group">
                    <?php for($i=1;$i<=$numberOfPages;$i++){ ?>
                        <button type="button" class="btn btn btn-outline-info">
                            <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>">
                                <?php echo $i ?>
                            </a>
                        </button>
                    <?php } ?>
                </div>
                <?php endif ?>  
                <?php
                mysqli_close($connect);?> 
            </div>    
            <div class="col-md-3 px-0 bodyright">
                <div class="search-container">
                    <form>
                      <input type="text" placeholder="Tìm kiếm..." name="search" value="<?php echo $search ?>">
                      <button type="submit"><i style="color: #007bff;" class="fa fa-search"></i></button>
                    </form>
                    <hr>
                    <div class="">
                        <div class="tenchuong font-weight-bold">VỀ CHÚNG TÔI</div>
                        <div class="mt-4 ml-1 mr-2">
                            <img class="img-fluid" src="index_1.jpg">
                        </div>  
                        <div>
                            <p class="text-center"><small>Kỹ sư cơ khí đại học Bách Khoa Hà Nội</small></p>
                        </div>
                    </div>
                    <hr size="30">
                    <div>
                        <div class="tenchuong font-weight-bold">LIÊN HỆ VỚI CHÚNG TÔI TẠI ĐÂY</div>
                        <p class="mt-4 ml-1 mr-2">Email: datsonhust@gmail.com</p>
                        <a class="mt-4 ml-1 mr-2" href="https://www.facebook.com/mechatronicshust/"  target="_blank"><i class="fab fa-facebook-square"></i></a>
                    </div>
                    <hr>
                </div>
            </div>   
        </div>
    </div>
    <div class="footer-text container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div>
                    <p class="font-weight-bold">LIÊN HỆ VỚI CHÚNG TÔI</p>
                    <p>Email: nguyentiendat@gmail.com</p>
                    <a href="https://www.facebook.com/mechatronicshust/"  target="_blank"><i class="fab fa-facebook-square"></i></a>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div>
                    <p class="font-weight-bold">CHỊU TRÁCH NHIỆM QUẢN LÝ NỘI DUNG</p>
                    <p>Người tổng hợp: Đạt Sơn</p>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a class="" href="index.php"><img id="logo" src="logo.png"></a>
        </div>
        <div>
            <p class="text-center">Copyright &#169; 2019 DatSon</p>
        </div>
    </div>
</body>
</html>
