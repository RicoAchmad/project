<?php
session_start();
include 'authcheck.php';
?>
<!DOCTYPE html>
<head>
    <title>Kasir</title>
</head>
<body>
    <h1><center>Selamat Datang</center></h1>
    <h3> Apa Yang Anda Cari? </h3>
    <fieldset>
    <a href="barang.php">Menu</a>
</fieldset>
    <fieldset>
    <a href="user.php">User List</a>
</fieldset>
<fieldset>
    <a href="logout.php">Logout</a>
</fieldset>
</body>
</html>