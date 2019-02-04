<?php
require_once('core/init.php');
require_once('view/header.php');

if(!isset($_SESSION['user'])){
  header('Location: login.php');
}
 ?>

<div class="content potongsaldo">
  <div class="container">
    <div class="content__title">
      <h1 class="title--pemisah">GadgetID Transaction</h1>
    </div>
    <div class="content__transaction-status">
      <div class="content__transaction__container content__transaction-status">
        <div class="content__transaction-status__item">
          <div class="content__transaction-status__item__icon">
            <i class="icon-basket"></i>
          </div>
          <div class="content__transaction-status__item__label">
            <p>Pemesanan</p>
          </div>
        </div>
        <div class="content__transaction-status__item">
          <div class="content__transaction-status__item__icon">
            <i class="icon-basket"></i>
          </div>
          <div class="content__transaction-status__item__label">
            <p>Pemesanan</p>
          </div>
        </div>
        <div class="content__transaction-status__item">
          <div class="content__transaction-status__item__icon">
            <i class="icon-basket"></i>
          </div>
          <div class="content__transaction-status__item__label">
            <p>Pemesanan</p>
          </div>
        </div>
        <div class="content__transaction-status__item">
          <div class="content__transaction-status__item__icon">
            <i class="icon-basket"></i>
          </div>
          <div class="content__transaction-status__item__label">
            <p>Pemesanan</p>
          </div>
        </div>

      </div>
    </div>
    <div class="content__transaction-description">
      <div class="content__transaction__container content__transaction-description">
        <div class="content__transaction-description">
          <h1>Transaction</h1>
          <table>
            <tr>
              <td>No Tranaksi</td>
              <td>: 112312312321</td>
            </tr>
            <tr>
              <td>Pembeli</td>
              <td>: Arya</td>
            </tr>
            <tr>
              <td>Penjual</td>
              <td>: GadgetID</td>
            </tr>
          </table>
          <table>
            <tr>
              <td>Samsung Galaxy Note 9</td>
              <td>x2</td>
            </tr>
            <tr>
              <td>Rp. 18,000,000</td>
            </tr>
            <tr>
              <td>Total</td>
              <td>Rp. 26,000,000</td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

 <?php
 require_once('view/footer.php');
 ?>
