<?php ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin | @yield('title')</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/popup.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  </head>
  <body>
    <div class="admin__nav">
      <div class="admin__nav__brand">
        <span class="admin__nav__brand--main">GadgetID</span>
        <span class="admin__nav__brand--tag">Seller</span>
      </div>
      <div class="admin__nav__menu">
        <ul>
          <li class="parent"><a href="/admin/order" class="parent active"><span>Order</span></a>
          </li>
          <li class="parent"><a href="/admin/product" class="parent"><span>Product</span></a>
          </li>
          <li class="parent"><a href="/admin/transaction" class="parent"><span>Transaction</span></a>
          </li>
          <li class="logout" class="parent"><a href="/logout"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
        </ul>
      </div>
    </div>
    <div class="admin__content">
      @yield('content')
    </div>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/index.js"></script>
  </body>
</html>
