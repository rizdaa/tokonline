<?php 
    require 'function.php';

    $products = $_GET['id_mobil'];
    $product = query("SELECT * FROM product WHERE id_mobil = $products")[0];

    $gambar = $product['gambar'];
    $rental_id = $product['id_rental'];
    $nama = $product['nama_mobil']; //htmlspecialchars($product['nama'])
    $merek = $product['merek']; //htmlspecialchars($product['kelas'])
    $harga = $product['harga'];
    $description = $product['description'];
    $tahun = $product['tahun'];
    $warna = $product['warna'];
    $cc = $product['cc'];
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <style type="text/css">
        body{
          background-color: #bd2130 !important;
        }
    </style>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-company-red">
                <a class="navbar-brand" >Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                  </ul>
                   
                        <a href="login.php" class="btn btn-primary ">Login</a>


                </div>
              </nav>
        <div class="container" style="align-content: center; margin-top: 50px;">
			<div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" >
                                    <img src="img/<?= $gambar;?>" style="width: 700px; height: 350px;">
                                    <!-- <div style="margin-top: 4px;" > 
											<img style="width: 346px; height: 200px;" src="mobil/2.jpg">
										    <img style="width: 346px; height: 200px;" src="mobil/3.jpg" href="mobil/2.jpg" >
									</div> -->
                            </div><br>
                            <div class="card-body">
                                <div class="form-group">
                                	<label class="text-primary" style="font-style: bold; font-size: 30px; color : black;">Rp.<?= $harga; ?> / hari</label> <br>
                                    <label style="font-style: bold; font-size: 20px; color : black;">Description</label>
                                    <p> <?= $description; ?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                            	<div class="form-group">
                                	<b style="font-size: 30px; color: blue;"> <u>Detail Mobil</u> </b> <br>
                                </div>

                                <div class="form-group">
                                	<b style="font-size: 20px;">Nama mobil</b> <br>
                                	<h5 style="font-size: 15px; " ><?= $nama; ?></h5>
                                </div>

                                <div class="form-group">
                                	<b style="font-size: 20px;">Merek mobil</b> <br>
                                	<h5 style="font-size: 15px; " ><?= $merek; ?></h5>

                                <div class="form-group">
                                	<b style="font-size: 20px;">Warna mobil</b> <br>
                                	<h5 style="font-size: 15px; " ><?= $warna; ?></h5>
                                </div>

                                <div class="form-group">
	                                <b style="font-size: 20px;">Tahun Pembuatan mobil</b> <br>
                                	<h5 style="font-size: 15px; " ><?= $tahun; ?></h5>
                                </div>

                                <div class="form-group" >
                                	<b style="font-size: 20px;">Mesin cc mobil</b> <br>
                                	<h5 style="font-size: 15px; " ><?= $cc; ?></h5>
                                </div>

                                <div class="form-inline my-2 my-lg-0">
					                      <a type="submit" name="submit" href="form-booking.php?id_mobil=<?= $products; ?>&id_rental=<?= $rental_id;?>&nama_mobil=<?= $nama; ?>" class="btn btn-primary">Booking Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
			</div>
</body>
	<!-- <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script> -->
</html>