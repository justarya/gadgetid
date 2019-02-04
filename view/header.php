<?php
require_once('core/init.php');

$resultUserByName = loadUserByName($_SESSION['user']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GadgetID</title>
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/fontello/css/fontello.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  </head>
  <body>
    <nav>
      <div class="nav__brand">
        <a href="index.php">GagdetID</a>
      </div>
      <div class="nav__search">
        <input type="text" name="" value="" placeholder="cari">
      </div>
      <div class="nav__account">
        <?php if(isset($_SESSION['user'])){
          ?>
          <ul class="menu-item">
            <li><a href="troli.php"> Troli</a></li>
            <?php while($rowUser = mysqli_fetch_assoc($resultUserByName)){
              $_SESSION['saldo'] = $rowUser['saldo'];
              $_SESSION['iduser'] = $rowUser['id'];
              ?>
                <li><a href="troli.php">Saldo [<?= $rowUser['saldo']; ?>]</a></li>
              <?php
            } ?>
            <li><a href="logout.php"><?= $_SESSION['user'];  ?></a></li>
          </ul> <?php
        }else{
          ?>
          <ul class="menu-item">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
          <?php
        } ?>

      </div>
    </nav>
    <div class="menu">
      <ul class="menu-item">
        <li><a href="index.php">Terbaru</a></li>
        <li><a href="index.php?menu=smartphone">Smartphone</a></li>
        <li><a href="index.php?menu=laptop">Laptop</a></li>
        <li><a href="index.php?menu=pc">PC</a></li>
        <li><a href="index.php?menu=tablet">Tablet</a></li>
        <li><a href="index.php?menu=gaming">Gaming</a></li>
        <li><a href="index.php?menu=wearable">Wearable</a></li>
      </ul>
    </div>
