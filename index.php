<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
require "functions.php";


$jumlahDataPerHalaman = 30;
$jumlahData = count(query("SELECT * FROM databuku"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

if( isset($_GET["filtercategory"]) ) {
    $category = $_GET["category"];

    $outputBuku = query("SELECT * FROM databuku WHERE category = '$category' ");
} else {
    $outputBuku = query("SELECT * FROM databuku LIMIT $awalData, $jumlahDataPerHalaman");
}

$databuku = $outputBuku;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku</title>
    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 80px;
            left: 330px;
            z-index: -1;
            display: none;
        }
    </style>
</head>
<body>   

    <h1>Management Buku</h1>

    <a href="tambah.php">Tambah Data Buku</a>
    <br> <br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Search..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>

        <img src="img/loader.gif" class="loader">

    </form>

<form action="" method="get">
	<ul>
		<li>
			<label for="category">Category Buku : </label>
            <input type="text" name="category" id="category">
		</li>
        <li>
			<button type="submit" name="filtercategory">Filter!</button>
		</li>
	</ul>
</form>

   <!-- navigasi -->
   <?php if($halamanAktif > 1) : ?>
    <a href="?halaman=<?php echo $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) :?>
        <?php if( $i == $halamanAktif ) : ?>
        <a href="?halaman=<?php echo $i; ?>" style="font-weight: bold; color: red;"><?php echo $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>
    <?php if($halamanAktif < $jumlahHalaman) : ?>
    <a href="?halaman=<?php echo $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?>


    <!-- <a href="category.php">Category Buku</a> -->
    <br>
    <br>
    <div id="container">
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Kode buku</th>
            <th>Category</th>
            <th>Nama buku</th>
            <th>Deskripsi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $databuku as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"];?>">Edit</a> |
                <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"];?>" width="50"></td>
            <td><?= $row["kode_buku"]; ?></td>
            <td><?= $row["category"]; ?></td>
            <td><?= $row["nama_buku"]; ?></td>
            <td><?= $row["deskripsi"]; ?></td>         
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        
    </table>
    </div>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
    
</body>
<br>
<a href="logout.php">Logout</a> 

</html>