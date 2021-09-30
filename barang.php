<?php 
include 'config.php';
session_start();
include 'authcheck.php';
$view = $dbconnect->query("SELECT * FROM barang");
?>

<!DOCTYPE html>
<head> 
    <title>List Menu</title>
</head>
<body>
    <div class="container">
        
        <?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') {?>
            <?=$_SESSION['success']?>
        <?php }?>

    <h2><center>List Menu</center></h2>
    <a href="barang_add.php">Tambah Menu</a>
    <fieldset>
    <table border="1">
        <tr> 
            <th>No Menu</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
</tr>
<?php
while ($baris = $view->fetch_array()) { ?>
<tr> 
    <td> <?= $baris['id_barang'] ?> </td>
    <td> <?= $baris['nama'] ?> </td>
    <td> <?= $baris['harga'] ?> </td>
    <td> <?= $baris['jumlah'] ?> </td>
    <td>
        <a href="barang_edit.php?id=<?=$baris['id_barang']?>">Edit</a> | <a href="barang_hapus.php?id=<?=$baris['id_barang']?>">Hapus</a>
</td>
</tr>

<?php
}
?>

</table>
</fieldset>
</div>
</body>
</html>