<?php

    session_start(); 
    require 'function.php';

    $id_rental = $_SESSION['id_rental'];

    if(isset($_SESSION['logout'])){
        $_SESSION =[];
        session_unset();
        session_destroy();
        header("Location : index.php");
        exit;
    }

    if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
    } 

    $product = query("SELECT * from booking inner join product 
        on booking.id_rental = product.id_rental where booking.id_rental = $id_rental");

    // $product = query("SELECT * FROM booking where id_rental = $id_rental;");


    if ( isset ($_POST["cari"])) {
        $product = cari($_POST["keyword"]);
    }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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

                    <li>
                        <a class="nav-link" href="dashboard.php?id_rental=<?= $_SESSION['id_rental']; ?>">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Input product</p>
                        </a>
                    </li>
                    
                    <li>
                        <a class="nav-link" href="./table.php?id_rental=<?= $_SESSION['id_rental']; ?>">
                            <i class="nc-icon nc-notes"></i>
                            <p>Product list</p>
                        </a>
                    </li>

                    <li class="nav-item active">
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
                    <a class="navbar-brand" href="#pablo"> Table List </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Booking List</h4>
                                    <p class="card-category">berisi input calon penyewa yang ingin sewa mobil</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID Booking</th>
                                            <th>Gambar</th>
                                            <th>Nama penyewa</th>
                                            <th>Nama mobil</th>
                                            <th>No Hp</th>
                                            <th>gender</th>
                                            <th>awal sewa</th>
                                            <th>akhir sewa</th>
                                        </thead>
                                        <tbody>
                            
                                            <?php $i=1; ?>
                                            <?php foreach ($product as $data) : ?>
                                            <tr>
                                                <td><?php echo $data['id_booking']; ?></td>
                                                <td><img src="img/<?php echo($data['gambar']) ?>" height="50px" width="50px"></td>
                                                <td><?php echo($data["nama"]) ?></td>
                                                <td><?php echo($data["nama_mobil"]) ?></td>
                                                <td><?php echo($data["nomor"]) ?></td>
                                                <td><?php echo($data["gender"]) ?></td>
                                                <td><?php echo($data["awal_sewa"]) ?></td>
                                                <td><?php echo($data["akhir_sewa"]) ?></td>
                                                <td>
                                                    <a href="hapus.php?=<?= $data['id'] ?>" style="padding: 10px;">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

</html>