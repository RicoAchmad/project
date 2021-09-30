<?php

if(isset($_SESSION['userid'])){

    if ($_SESSION['role_id']==2){
        header("location:kasir.php");
    }

} else {
    $_SESSION['error'] = "Anda Harus Login Dahulu";
    header("location:login.php");
}
?>