<?php
include 'config.php';
session_start();

if(isset($_POST['masuk'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "SELECT * FROM users WHERE username='$username' and password='$password'");

    $data = mysqli_fetch_assoc($query);

    $check = mysqli_num_rows($query);

    if(!$check) {
        $_SESSION['error'] = "Username & Password salah";
    }else
    {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role_id'] = $data['id_role'];

        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<head>
    <title> Form Login </title>
</head>

<body>
    <?php if(isset($_SESSION['error']) && $_SESSION['error'] != '') {?>
    <?=$_SESSION['error']?>

    <?php
    }
    $_SESSION['error'] = '';
    ?>
    <h2>Login</h2>
    <form method="POST">
        <fieldset>
        Username:
        <input type ="text" name="username" placeholder="Masukan Username">
        <br>
        <br>
        Password : 
        <input type ="password" name="password" placeholder="Masukan Password">
        <br>
</fieldset>
<br>

        <input type="submit" name="masuk" value="Masuk">
</body>
</html>

