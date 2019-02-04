<?php
require_once('core/init.php');
require_once('view/header.php');

if(!isset($_SESSION['user'])){
  header('Location: login.php');
}
if(isset($_GET['id'])){
  if(checktroli($_SESSION['user'],$_GET['id'])){
    // jika barang sudah ada di troli
    if(updateTroli($_SESSION['user'],$_GET['id'])){
      echo "Update Troli SUCCESS";
    }else{
      echo "Update Troli GAGAL";
    }
  }else{
    // jika barang belum ada di troli
    if(addTroli($_SESSION['iduser'],$_GET['id'])){
      echo "success added";
    }else{
      echo "gagal!";
    }
  }
}
$resultTroli = loadTroli($_SESSION['iduser']);
 ?>

<div class="content troli">
  <div class="container">
    <div class="content__title">
      <h1 class="title--pemisah">Troli</h1>
    </div>
    <div class="content__list__container">
      <?php while($rowTroli = mysqli_fetch_assoc($resultTroli)){
        $resultProduct = loadProductById($rowTroli['id_product']);
        while($rowProduct = mysqli_fetch_assoc($resultProduct)){
          ?>
          <div class="content__list">
            <div class="content__list__image" style="background-image:url('<?= $rowProduct['image_product']; ?>')"></div>
            <div class="content__list__detail">
              <div class="content__list__title">
                <h1><?= $rowProduct['nama_product']; ?></h1>
              </div>
              <div class="content__list__title">
                <span>Rp. <?= $rowProduct['harga_product']; ?></span>
              </div>
            </div>
            <div class="content__list__control">
              <select class="" name="jumlah">
                <?php for($i = 1; $i <= $rowProduct['stok_product']; $i++){
                  ?>
                  <option value="<?= $i; ?>"><?= $i; ?></option>
                  <?php
                } ?>
              </select>
              <a href="#"><i class="">Remove</i></a>
            </div>
          </div>
          <?php
        }
      } ?>
    </div>
    <div class="content__button">
      <a href="potongsaldo.php" class="button" style="float:right">Langsung ke Pembayaran</a>
    </div>
  </div>
</div>

 <?php
 require_once('view/footer.php');
 ?>
