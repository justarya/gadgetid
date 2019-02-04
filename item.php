<?php require_once("view/header.php"); ?>
<?php require_once("core/init.php"); ?>
<?php
$resultRecomend = loadProduct();

if(!$_GET['id']){
  header("Location: index.php");
}
$resultProduct = loadProductById($_GET['id']);

while($rowProduct = mysqli_fetch_assoc($resultProduct)){
  ?>
    <div class="content item">
      <div class="container">
        <div class="item--left">
          <div class="item__galery">
            <div class="slider-for">
              <div style="background-image: url('<?= $rowProduct['image_product']; ?>')"></div>
            </div>
            <div class="slider-nav">
              <div style="background-image: url('<?= $rowProduct['image_product']; ?>')"></div>
            </div>
          </div>
        </div>
        <div class="item--right">
          <div class="item__title">
            <h2><?= $rowProduct['nama_product']; ?></h2>
          </div>
          <div class="item__detail">
            <div class="item__rating">

            </div>
            <div class="item__button-buy">
              <a href="troli.php?id=<?= $rowProduct['id_product'] ?>" type="button" name="button">Beli</a>
            </div>
          </div>
          <div class="item__desc">
            <p><?= $rowProduct['deskripsi_product']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="content related">
      <div class="container">
        <div class="related__title">
          <h1 class="title--pemisah">Related</h1>
        </div>
        <div class="related__list">
          <?php while($rowProduct = mysqli_fetch_assoc($resultRecomend)){
            ?>
            <a href="item.php?id=<?= $rowProduct['id_product']; ?>" class="content__list">
              <div class="content__list__image" style="background-image:url('<?= $rowProduct['image_product'] ?>')"></div>
              <div class="content__list__title">
                <h2><?= $rowProduct['nama_product']; ?></h2>
              </div>
              <div class="content__list__price">
                <span>Rp. <?= $rowProduct['harga_product']; ?></span>
              </div>
            </a>
            <?php
          } ?>
          <!-- <a href="#" class="content__list">
            <div class="content__list__image" style="background-image:url('assets/image/Samsung_Galaxy_Note_9.jpg')"></div>
            <div class="content__list__title">
              <h2>Samsung Galaxy Note 9 - 128GB</h2>
            </div>
            <div class="content__list__price">
              <span>Rp. 18,000,000</span>
            </div>
          </a>
          <a href="#" class="content__list">
            <div class="content__list__image" style="background-image:url('assets/image/Samsung_Galaxy_Note_9.jpg')"></div>
            <div class="content__list__title">
              <h2>Samsung Galaxy Note 9 - 128GB</h2>
            </div>
            <div class="content__list__price">
              <span>Rp. 18,000,000</span>
            </div>
          </a>
          <a href="#" class="content__list">
            <div class="content__list__image" style="background-image:url('assets/image/Samsung_Galaxy_Note_9.jpg')"></div>
            <div class="content__list__title">
              <h2>Samsung Galaxy Note 9 - 128GB</h2>
            </div>
            <div class="content__list__price">
              <span>Rp. 18,000,000</span>
            </div>
          </a> -->
        </div>
      </div>
    </div>

  <?php
} ?>
<?php require_once("view/footer.php"); ?>
