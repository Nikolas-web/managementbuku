<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';
if( isset($_POST["submit"]) ) {
	if( tambah($_POST) > 0 ) {
		echo "
              <script>
              alert('data berhasil ditambahkan!');
              document.location.href = 'index.php'
              </script>  
            ";
	} else {
		echo "
              <script>
              alert('data gagal ditambahkan!');
              document.location.href = 'index.php'
              </script>  
		";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data buku</title>
</head>
<body>

<h1>Tambah data buku</h1>

<form action="" method="post" enctype="multipart/form-data">
	<ul>
		<li>
			<label for="kode_buku">Kode Buku: </label>
			<input type="text" name="kode_buku" id="kode_buku">
		</li>
		<li>
			<label for="nama_buku">Nama Buku: </label>
			<input type="text" name="nama_buku" id="nama_buku">
		</li>
		<li>
			<label for="category">Category : </label>
			<input type="text" name="category" id="category" required>
		</li>
		<li>
			<label for="deskripsi">Deskripsi : </label>
			<input type="text" name="deskripsi" id="deskripsi">
		</li>
		<li>
			<label for="gambar">Gambar : </label>
			<input type="file" name="gambar" id="gambar">
		</li>
		<li>
			<button type="submit" name="submit">Tambah Data!</button>
		</li>
	</ul>
</form>

<br>
<a href="/challenges/buku4/index.php">Kembali Ke Halaman index</a>

</body>
</html>