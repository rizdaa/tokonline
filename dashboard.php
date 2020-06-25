<?php 
session_start();

include 'function.php';

// $id_user = $_GET['id'];

$id_rental = $_SESSION['id_rental'];

if(isset($_POST['logout'])){
    session_unset();
    $_SESSION['id_user'] = [];
    session_destroy();
    echo (" <script>
                    alert('Kamu sudah logout');
                    document.location.href = 'index.php';
            </script>");
}

if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
}
// header('Location : login.php');
    // exit;
if (isset($_POST["submit"])) {
    
        if (tambah($_POST) > 0) {
            echo (" <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'table.php';
                </script>");
        } else {
            echo (" <script>
                    alert('data gagal ditambahkan silakan masukan data ulang');
                </script>");
            echo($conn -> error);
        }

    }
 ?>

 <!DOCTYPE html>

<html lang="en">

<head>
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Dashboard
                    </a>
                </div>
                <ul class="nav">

                    <li>
                        <a class="nav-link" href="./user.php?id_rental=<?= $_SESSION['id_rental']; ?>">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Input product</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./table.php?id_rental=<?= $_SESSION['id_rental']; ?>">
                            <i class="nc-icon nc-notes"></i>
                            <p>Product List</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="./booking-list.php?id_rental=<?= $_SESSION['id_rental']; ?>">
                            <i class="nc-icon nc-notes"></i>
                            <p>Booking list</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">

                                <a href="logout.php">Logout</a>
                                <!-- <form action="" method="post">
                                    <input type="submit" class="fadeIn fourth" value="Logout" name="logout">
                                </form> -->
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                    <h4 class="card-title">Input Form</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Mobil</label>
                                    <input type="text" name="nama" class="form-control" value="" required="">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Merek Mobil</label>
                                    <input type="text" name="merek" class="form-control" value="" required="">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Harga sewa mobil /hari</label>
                                    <input type="text" name="harga" class="form-control" value="" required="">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:200px "></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tahun">Tahun pembuatan mobil</label>
                                    <input type="text" name="tahun" class="form-control" value="" required="">
                                    <p class="text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="warna">Warna Mobil</label>
                                    <input type="text" name="warna" class="form-control" value="" required="">
                                    <p class="text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="cc">Mesin CC Mobil</label>
                                    <input type="text" name="cc" class="form-control" value="" required="">
                                    <p class="text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Foto Produk</label>
                                    <input type="file" name="gambar" class="form-control" required="">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="id_rental" class="form-control" value="<?= $id_rental;?>">
                                </div>

                                <div class="row">
                                    <div class="form-group" style="padding-left: 15px;">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer> -->

        </div>
    </div>
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script> -->

</html>
