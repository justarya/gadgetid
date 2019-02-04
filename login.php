<?php
require_once('core/init.php');

if(isset($_SESSION['user'])){
  header('Location: index.php');
}

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  if(!empty(trim($username)) && !empty(trim($password))){
    if(cekLogin($username,$password)){
      if(cekAdmin($username)){
        $_SESSION['role'] = 1;
        $_SESSION['user'] = $username;
        header("Location: admin/index.php");
      }else{
        $_SESSION['role'] = 2;
        $_SESSION['user'] = $username;
        header("Location: index.php");
      }
    }else{
      $msg = "password salah!";
    }
  }else{
    $msg = "Form Tidak Boleh Kosong!";
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <form class="" action="" method="post">
      <div class="form__title">
        <h1>Login</h1>
      </div>
      <?php if(isset($msg)){
        ?> <div class="form__msg"> <span> <?= $msg; ?></span> </div> <?php
      } ?>
      <div class="form__input">
        <input type="text" name="username" placeholder="Username" autocomplete="off">
        <input type="password" name="password" placeholder="Password" autocomplete="off">
        <input type="submit" name="submit" value="Login">
      </div>
      <div class="form__info">
        <p>Tidak punya akun? <a href="register.php">Register</a> Yuk!</p>
      </div>
    </form>
  </body>
</html>
