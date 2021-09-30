<?php
include 'config.php';
session_start();

if(isset($_GET['id'])){

    $id = $_GET['id'];

    mysqli_query($dbconnect, "DELETE FROM users WHERE id_user='$id' ");
    $_SESSION['success'] = 'Berhasil Menghapus User';

    header("location:user.php");
}
?>