<?php
sleep(1);
require "../functions.php";

$keyword = $_GET["keyword"];

$query = "SELECT * FROM databuku
            WHERE 
            nama_buku LIKE '%$keyword%' OR
            kode_buku LIKE '%$keyword%'  OR
            category LIKE '%$keyword%' 
            ";

$databuku = query($query);


?>


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