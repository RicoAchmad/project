<?php
include 'config.php';
session_start();
include 'authcheckkasir.php';

if(isset($_POST['id_barang'])){
    $id_barang = $_POST['id_barang'];
    $data = mysqli_query($dbconnect, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $b = mysqli_fetch_assoc($data);

    $barang= [
        'id' => $b['id_barang'],
        'nama' => $b['nama'],
        'harga' => $b['harga'],
        'quantity' => 1
    ];

    $_SESSION['cart'][]=$barang;
    header("location:kasir.php");
}
?>