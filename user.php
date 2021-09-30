<?php
include 'config.php';
session_start();
include 'authcheck.php';

$view = $dbconnect->query("SELECT u.*,r.nama as nama_role FROM users as u INNER JOIN roles as r ON u.id_role=r.id_role");

?>

<!DOCTYPE html>
<head>
    <title> List User</title>
</head>
<body>
    <div class="container">

    <?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

        <?$_SESSION['success']?>

        <?php
    }
            $_SESSION['success'] = '';
            ?>

            <h2>User List</h2>
            <a href="user_add.php">Tambah User</a>
            <table border="1">
                <tr>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role Akses</th>
                    <th>Aksi</th>
        </tr>
        <?php
        while ($baris = $view->fetch_array()) {?>
        <tr>
            <td><?=$baris['id_user'] ?> </td>
            <td><?=$baris['nama'] ?> </td>
            <td><?=$baris['username'] ?> </td>
            <td><?=$baris['password'] ?> </td>
            <td><?=$baris['nama_role']?> </td>
            <td>
                <a href="user_edit.php?id=<?= $baris['id_user'] ?>">Edit</a> |
                <a href="user_hapus.php?id=<?= $baris['id_user'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
        </td>
        </tr>

        <?php
        }
        ?>
</table>
        </div>
        </body>
        </html>