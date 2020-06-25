<?php 

require 'function.php';

if (isset($_POST['submit'])) {
  header('registrasi.php');
}

// $products = query("SELECT * FROM product");
$products = query("SELECT id_mobil, gambar, nama_mobil, harga, warna, tahun, cc , merek, nama_rental 
  FROM product inner join users on product.id_rental = users.id_rental");

 ?>

<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style type="text/css"> 
        .my-flex-card > div > div.card {
            height: calc(100% - 15px);
            margin-bottom: 15px;
        }
        .bg-company-red {
            background-color: #800080 /*!important*/
        }
        .card .card-blonck {max-height:300px;overflow:auto;}

        .embed-responsive .card-img-top {
            object-fit: cover;
        }
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

      <div class="jumbotron jumbotron-fluid text-center bg-dark text-light">
        <div class="container">
            <img src="logo.PNG" alt="" class="w-25 rounded-circle">
          <h1 class="display-4">Selamat Datang Di Website Kami :)</h1>
          <p class="lead">Website ini menyediakan jasa penyewaan mobil / rental mobil</p>
        </div>
      </div>
      <br>
        <input type="search" placeholder="Search" style="size: 10px; margin-left: 200px;">
        <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
      <br>
      <br>
      <div class="container text-center">
        <div class="row my-flex-card">

        <?php foreach ($products as $product) : ?>
          <div class="col-sm" style="padding-top: 15px">
            <div class="card" style="width: 18rem;">
              <div embed-responsive embed-responsive-16by9>
                <img class="card-img-top embed-responsive-item" src="img/<?= $product['gambar']; ?>" alt="Card image cap" style="height: 190PX; width: 285px;">
              </div>
              
                <div class="card-body">
                  <h4 class="card-title" style="margin-top: 0px;"><?= $product['nama_mobil']; ?></h4>
                  <h5 style="color: blue">Rp.<?= $product['harga']; ?> / hari </h4>
                  <p class="card-text">
                      <b>Tahun :</b> <?= $product['tahun']; ?>
                      <b>Mesin :</b> <?= $product['cc']; ?> cc<br>
                      <b>Warna :</b> <?= $product['warna']; ?>
                      <b>merek :</b> <?= $product['merek']; ?> <br>
                      <b>Rental : </b> <?= $product['nama_rental'] ?>
                    </p>

                  <a href="detail.php?id_mobil=<?= $product['id_mobil']?>" class="btn btn-primary ">Lihat Detail</a>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
  </body>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>