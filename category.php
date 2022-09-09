<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
require "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Buku</title>

</head>
<body>   
    <h1>Category Buku</h1>
   <!-- navigasi -->
    <div id="container">
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <th>No.</th>
            <th>Category</th>
        </tr>
        
        <?php foreach( $category as $row) : ?>
        <tr>
            <td><?= $row["category_buku"]; ?></td>        
        </tr>
       
        <?php endforeach; ?>
    </table>
    </div>
</body>
</html>