<?php 

    require 'function.php';
	$id_mobil = $_GET['id_mobil'];
    $id_rental = $_GET['id_rental'];
    $nama_mobil = $_GET['nama_mobil'];

    if (isset($_POST["submit"])) {
    
        if (booking($_POST, $id_rental, $id_mobil, $nama_mobil) > 0) {
            echo (" <script>
                    alert('Terimakasih, bookingan anda berhasil ditambahkan. Kami akan segera menghubungi anda');
                    document.location.href = 'index.php';
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

    <title>Form Booking</title>

    <link href="css/form-booking.css" rel="stylesheet" media="all">
    <style type="text/css">
        body{
          background-color: #bd2130 !important;
        }
    </style>
</head>
    <link rel="stylesheet" type="text/css" href="css/form-booking.css">
<body>
    <br><a href="detail.php?id_mobil=<?= $id_mobil; ?>" style="margin-left: 20px; color: white;"><< Kembali</a>
    <div class="page-wrapper p-b-100 font-poppins" style="padding-top: 20px;">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <!-- <div class="card-header" >
                                    <img src="mobil/1.jpg" style="width: 680px; height: 350px;"> <br>
                            </div> -->
                <div class="card-body">
                    <h2 class="title">Booking Form</h2>

                    <form method="POST" action="">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama</label>
                                    <input class="input--style-4" type="text" name="nama">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Alamat</label>
                                    <input class="input--style-4" type="text" name="alamat">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nomor HP</label>
                                    <input class="input--style-4" type="text" name="nomor">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Jenis Kelamin</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Laki-laki
                                            <input type="radio" name="gender" value="Laki-laki">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Perempuan
                                            <input type="radio" name="gender" value="Perempuan">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">ID Mobil</label>
                                    <input class="input--style-4" type="text" name="product_id" disabled="" value="<?= $id_mobil; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="input-group">
                                <input class="input--style-4" type="hidden" name="rental_id" disabled="" value="<?= $id_rental; ?>">
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tanggal Awal Sewa</label>
                                    <div class="input-group-icon">
                                        <input type="date" name="awal" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tanggal Akhir Sewa</label>
                                    <div class="input-group-icon">
                                        <input  type="date" name="akhir" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="input-group">
                            <label class="label">Subject</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div> -->

                        <div> <!-- class="p-t-15" --> 
                            <button class="btn btn--radius-2 btn--blue" type="submit" style="margin-right: 5px;" name="submit">Booking Now!</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
    <!-- Main JS-->
    <script src="js/global.js"></script>
</html>
<!-- end document-->