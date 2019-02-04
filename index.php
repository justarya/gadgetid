<?php require_once("core/init.php"); ?>
<?php require_once("view/header.php"); ?>
<?php

if(isset($_GET['menu'])){
  $result = loadProductByTag($_GET['menu']);
}else{
  $result = loadProduct();
}
?>
    <div class="content">
      <div class="container">
        <?php while($row = mysqli_fetch_assoc($result)){
          ?>
          <a href="item.php?id=<?= $row['id_product'] ?>" class="content__list">
            <div class="content__list__image" style="background-image:url('<?= $row['image_product']; ?>')"></div>
            <div class="content__list__title">
              <h2><?= $row['nama_product']; ?></h2>
            </div>
            <div class="content__list__price">
              <span>Rp. <?= $row['harga_product']; ?></span>
            </div>
          </a>
          <?php
        } ?>
      </div>
    </div>
<?php require_once("view/footer.php"); ?>
