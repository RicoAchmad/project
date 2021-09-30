<?php

include 'config.php';
session_start();
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($dbconnect, "INSERT INTO barang VALUES('', '$nama' , '$harga' , '$jumlah')");

    $_SESSION['success'] = "Berhasil Menambahkan Menu";

    header("location:barang.php");
}
?>
<!DOCTYPE html>
<head>
    <title>Tambah Menu</title>

</head>
<body>
        <h2><center>Tambah Menu</center></h2>
        <form method="POST">
            <fieldset>
                Nama Menu :
                <input type="text" name="nama" placeholder="Nama Barang">
                <br>
                Harga :
                <input type="number" name="harga" min="0" placeholder="Masukan Harga">
                <br>
                Jumlah Barang :
                <input type="number" name="jumlah" min="0" placeholder="Masukan Jumlah">
                <br>
</fieldset>
<br>
                <input type="submit" name="simpan">
                <a href="barang.php">Kembali
</body>
</html>