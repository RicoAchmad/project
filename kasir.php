<?php
include 'config.php';
session_start();
include 'authcheckkasir.php';

$barang = mysqli_query($dbconnect, "SELECT * FROM barang ");

$sum = 0;
if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        $sum += $value['harga']*$value['quantity'];
    }
}
?>

<!DOCTYPE html>
<head>
    <title>Kasir</title>
</head>
<body>
    <h2><center> Kasir </center> </h2>
    <h3> Hello <?=$_SESSION['nama']?></h3>
    <a href="logout.php">Logout</a>
    ||
    <a href="keranjang_reset.php">Reset Keranjang</a>
    <hr>
    <form method="POST" action="keranjang.php">
    <select name="id_barang">
        <option value="">Pilih Barang</option>
        <?php while ($row = mysqli_fetch_array($barang)){ ?>
        <option value="<?=$row['id_barang']?>"><?=$row['nama']?></option>
        <?php } ?>
        <input type="submit" name="tambah" value="Tambah">
</select>
<br><br>
    <table border="1">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Quantity</th>
        <th>Total</th>
</tr>
<?php foreach ($_SESSION['cart'] as $key => $value) {?>
<tr>
    <td><?=$value['nama']?></td>
    <td><?=$value['harga']?></td>
    <td><?=$value['quantity']?></td>
    <td><?=$value['quantity']*$value['harga']?></td>
    <?php
}?>
        </table>
<h2>Total Harga : <?=$sum?></h2>
</body>
</html>