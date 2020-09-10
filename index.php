<!DOCTYPE html>
<html>
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
                                <a class="nav-link dropbtn active" href="">CÁC DÒNG XE</a>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="Toyota.php">TOYOTA CAMRY 2015</a>
                                    <a class="dropdown-item" href="error.php">AUDI A3 2015</a>
                                    <a class="dropdown-item" href="error.php">HONDA ACCORD 2015</a>
                                    <a class="dropdown-item" href="error.php">BMW 118i 2015</a>
                                    <a class="dropdown-item" href="error.php">HUYNDAI SONATA 2015</a>
                                    <a class="dropdown-item" href="error.php">MERCEDES BENZC200 2015</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown active mx-4">
                                <p style="color: #007bff;" class="dropbtn m-0 pt-2" onclick="functionscroll()" href="#">VỀ CHÚNG TÔI</p>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div> 
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item">
                <a href="Toyota.php"><img class="d-block img-fluid w-100" src="ToyotaCamry2015.jpg" alt="First slide"><h1 class="display-4 carousel-caption carousel-caption1 d-none d-md-block">Toyota Camry 2015</h1></a>      
            </div>
            <div class="carousel-item">
                <a href=""><img class="d-block img-fluid w-100" src="AudiA32015.jpg" alt="Second slide"><h1 class="display-4 carousel-caption carousel-caption2 d-none d-md-block">Audi A3 2015</h1></a>
            </div>
            <div class="carousel-item">
                <a href=""><img class="d-block img-fluid w-100" src="HondaAccord2015.jpg" alt="Third slide"><h1 class="carousel-caption carousel-caption3 d-none d-md-block display-4">Honda Accord 2015</h1></a>
            </div>
            <div class="carousel-item active">
                <a href=""><img class="d-block img-fluid w-100" src="BMW118i2015.jpg" alt="Third slide"><h1 class="display-4 carousel-caption carousel-caption4 d-none d-md-block">BMW 118i 2015</h1></a>
            </div>
            <div class="carousel-item">
                <a href=""><img class="d-block img-fluid w-100" src="HuyndaiSonata2015.jpg" alt="Third slide"><h1 class="display-4 carousel-caption carousel-caption5 d-none d-md-block">Huyndai Sonata 2015</h1></a>
            </div>
            <div class="carousel-item">
                <a href=""><img class="d-block img-fluid w-100" src="MercedesBenzC2002015.jpg" alt="Third slide"><h1 class="display-4 carousel-caption6 carousel-caption d-none d-md-block">Mercedes Benz C200 2015</h1></a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <i aria-hidden="true" class="fas fa-backward"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <i aria-hidden="true" class="fas fa-forward"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="mt-3 py-0 container-fluid">
        <div id="aboutus" class="row aboutus jumbotron jumbotron-fluid">
            <div class="col-sm-5">
                <div class="row hover01 px-5 mt-2 ml-5 column">
                    <div class="col-sm-6">
                        <figure><img src="index_1.jpg" /></figure>
                    </div>
                    <div class="col-sm-6">
                        <figure><img src="index_2.jpg" /></figure>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 px-5 py-3">
                <div class="px-5">
                    <h2 class="display-4 iamadmin text-center">VỀ CHÚNG TÔI</h2>
                    <p class="mt-5">Eldorado Fireplace Surrounds are available in four colors designed to represent various types of natural limestone. Choose from Honed, a smooth surface or Travertine, a more textured surface. Both include color and texture variations, providing the authentic character and attributes of natural stone.</p>
                    <p>Experience the soft and luxurious limestone finishes by Eldorado. Available in four unique colors and two handcrafted finishes, Limestone and Travertine.</p>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function functionscroll(){
            window.scrollTo(0, 515);
        }
    </script>
    <div class="mt-5 pt-5 footer-text container-fluid">
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