<?php 

require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if ( isset ($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
	}
		// if ( !$result) {
		// 	echo ("database tidak ada");
		// }
// ambil data (fetch) mahasiswa dari object result
// $data = mysqli_fetch_assoc($result);
	// mysqli_fetch_row() // mengembalikan array numerik
	// mysqli_fetch_assoc() // mengembalikan array assosiatif / array string
	// mysqli_fetch_array() //mengembalikan array numerikk dan assoc ada 2 data tipe dalam 1 array
	// mysqli_fetch_object() // mysqli_fetch_object($result ->npm);
// while ($data = mysqli_fetch_assoc($result)) {
//     var_dump($data["nama"]);
// }
// var_dump($mahasiswa);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index admin</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<br>
	<a href="tambah.php"> tambah mahasiswa</a>
	<br>
	<br>
	<form action="" method="post">
		<input type="text" name="keyword" placeholder="Mausukan keyword...." autofocus autocomplete="" size="50px">
		<button type="submit" name="cari"> Cari! </button>
	</form>

	<br>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Profile</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Edit</th>
		</tr>

		<?php $i=1; ?>
		<?php foreach ($mahasiswa as $data) : ?>
			<tr>
				<td><?php echo $i; ?></td>
				<!-- <td> echo($data["id"]) </td> -->
				<td><img src="img/<?php echo($data["profile"]) ?>" height="50px" width="50px"></a></td>
				<td><?php echo($data["npm"]) ?></td>
				<td><?php echo($data["nama"]) ?></td>
				<td><?php echo($data["kelas"]) ?></td>
				<td>
					<a href="ubah.php?id=<?= $data["id"] ?>">ubah</a> | 
					<a href="hapus.php?id=<?= $data["id"] ?>">hapus</a>  <!-- onclick="return confirm('yakin hapus?');" -->
				</td>
			</tr>
		<?php $i++; ?>
		<?php endforeach; ?>

	</table>
</body>
</html>