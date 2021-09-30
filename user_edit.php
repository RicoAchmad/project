<?php

include 'config.php';
session_start();

$role = mysqli_query($dbconnect, "SELECT * FROM roles");

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM users where id_user='$id'");
    $data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['id_role'];

    mysqli_query($dbconnect , "UPDATE users SET nama='$nama' , username='$username' , password='$password' , id_role=$role_id where id_user='$id'");

    $_SESSION['success'] = "Berhasil Edit Data";

    header("location:user.php");
}

?>
<!DOCTYPE html>
<head>
    <title>Edit User</title>
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

            <option value="<?=$row['id_role']?>"> <?=$row['nama']?></option>
            <?php

            }
            ?>
            </select>
        </fieldset>

            <input type="submit" name="update" value="Simpan">
            <a href="user.php">Kembali</a>
        </form>
        </body>
        </html>