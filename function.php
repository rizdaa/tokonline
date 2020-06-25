<?php 

$conn = mysqli_connect("localhost","root","","penjualan");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
	    $rows[]= $row;
	}
	// var_dump($rows);
	return $rows;

}

function tambah($data){
	global $conn;
	$id_rental = $data['id_rental'];
	$nama = $data['nama']; //htmlspecialchars($data['nama'])
	$merek = $data['merek']; //htmlspecialchars($data['kelas'])
	$harga = $data['harga'];
	$description = $data['description'];
	$tahun = $data['tahun'];
	$warna = $data['warna'];
	$cc = $data['cc'];
	// $profile = $data['profile']; //htmlspecialchars($data['profile'])
	$gambar = upload($id_rental,$nama,$warna);
	if ( !$gambar) {
		return false;			
	}

	$query = "INSERT INTO product VALUES
		('','$id_rental','$gambar', '$nama', '$harga', '$warna', '$tahun', '$cc', '$merek', '$description')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


 
function upload($id_rental,$nama,$warna){
	$data = query("SELECT * from product where id_rental = $id_rental");

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmp = $_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada gambar yang diupload 4 adalah pesan error artinya tidak ada gambar yg diupload
	if( $error === 4 ) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu')
			</script>";
		return false;	
	}

	$ekstensiFile = ['jpg','png','jpeg'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = end($ekstensiGambar);
	$ekstensiGambar = strtolower($ekstensiGambar);
	// var_dump($ekstensiGambar); die();
	// cek apakah ada ekstensi gambar pada nama gambar
	if ( !in_array($ekstensiGambar, $ekstensiFile)) {
		echo "<script>
				alert('yang anda upload bukan gambar')
			</script>";
		return false;
	}

	// cek ukuran gambar terlalu besar dari data yang ditetapkan
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar maks 1MB')
			</script>";
		return false;
	}
	// $namaFileBaru = uniqid(); //membuat string random agar nama gambar tidak sama dan menimpa file gambar yg lain
	$namaFileBaru = $id_rental;
	$namaFileBaru .= '_'.$nama;
	$namaFileBaru .= '_'.$warna;
	$namaFileBaru .= '_'.$namaFile;

	//jika lolos semua pengecekan data gambar siap di kembalikan dan di simpan kedalam folder img
	move_uploaded_file($tmp, 'img/'.$namaFileBaru);
	return $namaFileBaru;
}
		

function hapus($id){
	global $conn;
	$query = "DELETE FROM product WHERE id_mobil = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubah($product){
	global $conn;

	$gambarLama = $product['profileLama'];
    $id_mobil = $product['id_mobil'];
    $nama = $product['nama_mobil']; //htmlspecialchars($product['nama'])
    $merek = $product['merek']; //htmlspecialchars($product['kelas'])
    $harga = $product['harga'];
    $description = $product['description'];
    $tahun = $product['tahun'];
    $warna = $product['warna'];
    $cc = $product['cc'];
	
	if( $_FILES['gambar']['error'] === 4){ // === 4 artinya tidak ada gambar yang di upload
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	//cek apakah user ganti gambar baru atau tidak
	$query = "UPDATE product SET 
				gambar = '$gambar',
				nama_mobil = '$nama',
				harga = '$harga',
				warna = '$warna',
				tahun = '$tahun',
				cc = '$cc',
				merek = '$merek',
				description = '$description'
			  WHERE id_mobil = $id_mobil
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword){
	global $conn;

	$query = "SELECT * FROM product WHERE
				nama_mobil LIKE '%$keyword%' OR 
				harga LIKE '%$keyword%' OR
				merek LIKE '%$keyword%' ";
	return query($query);
}

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"])); //menghilangkan back slash dan mmmebuat huruf menjadi kecil
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$confirm = mysqli_real_escape_string($conn,$data["confirm"]);
	$nama = stripcslashes($data["nama"]);
	$email = stripcslashes($data["email"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' ");
	if (mysqli_fetch_assoc($result) ) {
		echo "<script> 
					alert('Username sudah terdaftar');
			  </script>";
		return false;
	}

	//cek jika password tidak sama
	if ($password !== $confirm) {
		echo "<script> 
					alert('konfirmasi password tidak sesuai');
			  </script>";
		return false;
	}

	//mengubah password menjadi enkripsi 
	$password = password_hash($password, PASSWORD_DEFAULT);
	$confirm = password_hash($confirm, PASSWORD_DEFAULT);
	$query = "INSERT INTO users VALUES('','$nama','$username','$password','$confirm','$email')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function booking($data,$id_rental,$id_mobil,$nama_mobil){
	global $conn;
	$nama = $data['nama']; //htmlspecialchars($data['nama'])
	$alamat = $data['alamat']; //htmlspecialchars($data['kelas'])
	$nomor = $data['nomor'];
	$gender = $data['gender'];
	$email = $data['email'];
	$awal = $data['awal'];
	$akhir = $data['akhir'];
	$query = "INSERT INTO booking VALUES
		('','$id_rental','$id_mobil', '$nama','$nama_mobil', '$alamat', '$nomor', '$gender', '$email', '$awal', '$akhir')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

?>