<?php 
session_start();

include 'function.php';

$id_mobil = $_GET["id_mobil"];
$id_rental = $_SESSION['id_rental'];

$product = query("SELECT * FROM product WHERE id_mobil = $id_mobil")[0];



if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
}
// header('Location : login.php');
    // exit;
if (isset($_POST["submit"])) {
    
        if (ubah($_POST) > 0) {
            echo (" <script>
                    alert('data berhasil diubah');
                    document.location.href = 'table.php';
                </script>");
        } else {
            echo (" <script>
                    alert('data gagal diubah, silakan masukan data ulang');
                </script>");
            echo($conn -> error);
        }

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

<body style="background-color: #000000;">
    <div class="wrapper" style="margin-top: 50px; margin-right: 50px; margin-left: 50px;">
        <div >
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                    <h4 class="card-title">Update Form</h4>
                            </div>

                            <div class="card-body">
                                <input type="hidden" name="profileLama" required value=<?= $product['gambar'] ?>>
                                <input type="hidden" name="id_mobil" class="form-control" value="<?= $id_mobil;?>">
                                
                                <div class="form-group">
                                    <label for="nama_mobil">Nama Mobil</label>
                                    <input type="text" name="nama_mobil" class="form-control" value="<?= $product['nama_mobil']?>" >
                                    <p class="text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Merek Mobil</label>
                                    <input type="text" name="merek" class="form-control" value="<?= $product['merek']?>">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Harga sewa mobil /hari</label>
                                    <input type="text" name="harga" class="form-control" value="<?= $product['harga']?>">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="textarea" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:200px "><?= $product['description']?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">

                            	<div class="form-group">
                            		<img src="img/<?= $product['gambar']?>" style="width: 225px; height: 225px;">
                                    <label for="gambar"></label>
                                    <input type="file" name="gambar" style="margin-top: 5px">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label for="tahun">Tahun pembuatan mobil</label>
                                    <input type="text" name="tahun" class="form-control" value="<?= $product['tahun']?>">
                                    <p class="text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="warna">Warna Mobil</label>
                                    <input type="text" name="warna" class="form-control" value="<?= $product['warna']?>">
                                    <p class="text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="cc">Mesin CC Mobil</label>
                                    <input type="text" name="cc" class="form-control" value="<?= $product['cc']?>">
                                    <p class="text-danger"></p>
                                </div>
                                


                                

                                <div class="row">
                                    <div class="form-group" style="padding-left: 15px;">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Ubah</button>
                                    </div>
                                    <div class="form-group" style="padding-left: 15px;">
                                        <a href="table.php?id_rental=<?=$id_rental?>" class="btn btn-danger btn-sm">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
<!-- <script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script> -->

</html>
