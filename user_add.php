<?php

include 'config.php';
session_start();

$role = mysqli_query($dbconnect , "SELECT * FROM roles");

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_role = $_POST['id_role'];

    mysqli_query($dbconnect , "INSERT INTO users VALUES ('' ,'$nama' , '$username' , '$password' , '$id_role' )");

    $_SESSION['success'] = "Berhasil Menambahkan Data";

    header("location:user.php");
}

?>
<!DOCTYPE html>
<head>
    <title>Tambah User</title>
    <form method="POST">
        <fieldset>
        <br>
        Nama :
        <input type="text" name="nama" placeholder="Masukan Nama">
        <br>
        Username :
        <input type="text" name="username" placeholder="Username">
        <br>
        Password :
        <input type="text" name="password" placeholder="Password">
        <br>
        Role Akses :
        <select name="id_role">
            <option value="">Pilih Role Akses</option>
            <?php while($row = mysqli_fetch_array($role)){?>
            <option value="<?=$row['id_role']?>"><?=$row['nama']?></option>
            <?php
            }
            ?>
            </select>
        </fieldset>

            <input type="submit" name="simpan" value="Simpan">
            <a href="user.php">Kembali</a>
        </form>
        </body>
        </html>