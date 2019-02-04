<?php
require_once('core/init.php');

if(isset($_SESSION['user'])){
  header('Location: index.php');
}

if(isset($_POST['submit'])){
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $alamat = $_POST['alamat'];
  $nohp = $_POST['nohp'];
  if(!empty(trim($nama)) && !empty(trim($username)) && !empty(trim($password)) && !empty(trim($repassword)) && !empty(trim($alamat)) && !empty(trim($nohp))){
    if(cekUsernameRegister($username)){
      if($password == $repassword){
        if(kirimRegister($nama,$username,$password,$alamat,$nohp)){
          $_SESSION['role'] = 2;
          $_SESSION['user'] = $username;
          header("Location: index.php");
        }else{
          $msg = "SISTEM ERROR!";
        }
      }else{
        $msg = "Password tidak sama";
      }
    }else{
      $msg = "Username sudah ada";
    }
  }else{
    $msg = "Form Tidak Boleh Kosong";
  }
}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <form class="" action="" method="post">
      <div class="form__title">
        <h1>Register</h1>
      </div>
      <?php if(isset($msg)){
        ?> <div class="form__msg"> <span> <?= $msg; ?></span> </div> <?php
      } ?>
      <div class="form__input">
        <input type="text" name="nama" placeholder="Nama" autocomplete="off">
        <input type="text" name="username" placeholder="Username" autocomplete="off">
        <input type="password" name="password" placeholder="Password" autocomplete="off">
        <input type="password" name="repassword" placeholder="Re-Password" autocomplete="off">
        <h2 class="form__pemisah">Alamat Pengiriman</h2>
        <textarea name="alamat" rows="8" cols="80" placeholder="Alamat"></textarea>
        <input type="number" name="nohp" placeholder="Nomor Handphone" autocomplete="off">
        <input type="submit" name="submit" value="Login">
      </div>
      <div class="form__info">
        <p>Sudah punya akun? <a href="login.php">Login</a> aja!</p>
      </div>
    </form>
  </body>
</html>
