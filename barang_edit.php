<?php

include 'config.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    //menampilkan berdasarkan ID
    $data = mysqli_query($dbconnect,"SELECT * FROM barang where id_barang='$id'");
    $data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($dbconnect,"UPDATE barang SET nama='$nama', harga='$harga' , jumlah='$jumlah' where id_barang='$id' ");
    header("location:barang.php");
}

?>

<!DOCTYPE html>
<head>
    <title>Edit Menu</title>
</head>
<body>
    <h2>Edit Menu</h2>
    <form method="POST">
        <fieldset>
        <br>
        Nama Menu :
        <input type="text" name="nama">
        <br>
        Harga :
        <input type="number" name="harga">
        <br>
        Jumlah barang :
        <input type="number" name="jumlah">
        <br>
        </fieldset>
<input type="submit" name="update">
<a href="barang.php">Kembali</a>
</form>
</body>
</html>

