<?php 

session_start();

if ( isset( $_SESSION['login']) ) {
    header('Location : dashboard.php');
    
} 



require 'function.php';
	if (isset($_POST['login'])) {
		// var_dump($_POST);
		$username = $_POST["username"];
		$password = $_POST['password'];

		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");

		if ( mysqli_num_rows($result) === 1) {

			$row = mysqli_fetch_assoc($result);

			if (password_verify($password, $row["password"])){
				// var_dump($row);
				$_SESSION['login'] = true; //set session
				$_SESSION['id_rental'] = $row["id_rental"];
				header('Location: dashboard.php?id_rental='.$_SESSION["id_rental"]);
				exit;
			}
			
			$error = true;
		}

		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
		
		
		
		<style type="text/css">
        body  {
          background-color: #bd2130 !important;
          margin: 0px;
        }

        img{
        	height: auto;
        	width: 50px;
        }

		</style>
</head>
<body>
		<a href="index.php" style="margin-left: 10px; margin-top: 10px; font-style: bold; color: white;"><< Kembali</a>

		<div class="wrapper fadeInDown">
		  <div id="formContent">
		    <!-- Tabs Titles -->

		    <!-- Icon -->
		    <div class="fadeIn first">

		      <img src="logo.PNG" id="icon" alt="User Icon" />
		    </div>

		    <!-- Login Form -->
		    <form action="" method="post">
		      <?php if(isset($error)) : ?>
		      	<h5 style="color: red; font-style: italic; font-size: 15px;"> Username atau password salah </h5>
		      <?php endif; ?>
		      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
		      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
		      <input type="submit" class="fadeIn fourth" value="Log In" name="login"> <br>

		    </form>

		    <!-- Remind Passowrd -->
		    <div id="formFooter">
		      <a class="underlineHover" href="registrasi.php">Belum punya akun? daftar disini</a>
		    </div>

		  </div>
		</div>
	</body>

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>