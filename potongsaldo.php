<?php
require_once('core/init.php');
require_once('view/header.php');

if(!isset($_SESSION['user'])){
  header('Location: login.php');
}
if(isset($_POST['submitPembayaran'])){
  $saldo = $_SESSION['saldo'];
  $pembayaran = $_POST['pembayaran'];
  if($saldo >= $pembayaran){
    if(saldoPengurangan($_SESSION['user'],$saldo,$pembayaran)){
      if(addTransaction($_SESSION['iduser'])){

        deleteTroli($_SESSION['iduser']);
        header('Location: transaksi.php');
      }else{
        echo 'Gagal menambahkan transaksi';
      }
    }else{
      echo 'Pembayaran Gagal';
    }
  }else{
    echo 'Saldo anda tidak mencukupi';
  }
}
 ?>

<div class="content potongsaldo">
  <div class="container">
    <form class="" action="" method="post">
      <h1>Pembayaran</h1>
      <table>
        <tr>
          <td>Saldomu</td>
          <td>: <?= $_SESSION['saldo']; ?></td>
        </tr>
        <tr>
          <td>Total Pembayaran</td>
          <td>: <?= $_SESSION['saldo']; ?></td>
        </tr>
      </table>
      <h3>Saldomu: Rp. <?= $_SESSION['saldo']; ?></h3>
      <h3>Total Pembayaran: Rp. 200,000</h3>
      <input type="hidden" name="pembayaran" value="200000">
      <input type="submit" name="submitPembayaran" value="Bayar Pakai Saldo >" class="button">
    </form>
  </div>
</div>

 <?php
 require_once('view/footer.php');
 ?>
