<?php 
	session_start();
	$_SESSION =[];
	session_unset();
	session_destroy();
	echo (" <script>
                    alert('Anda sudah logout');
                    document.location.href = 'index.php';
                </script>");
	exit;
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Logout</title>
 </head>
 <body>
 </body>
 </html>