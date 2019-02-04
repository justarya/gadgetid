<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GadgetID</title>
    <link rel="stylesheet" type="text/css" href="/vendors/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/vendors/fontello/css/fontello.css"/>
    <link rel="stylesheet" type="text/css" href="/vendors/slick/slick-theme.css"/>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  </head>
  <body>
    <nav>
      <div class="nav__brand">
        <a href="/">GagdetID</a>
      </div>
      <div class="nav__search">
        <form action="/cari" method="post">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="post">
          @if(empty($search))
          <input type="text" name="search" value="" placeholder="cari">
          @else
          <input type="text" name="search" value="{{ $search }}" placeholder="cari">
          @endif
        </form>
      </div>
      <div class="nav__account">
        @if(Session::get('username') !== null)
          <ul class="menu-item">
            <li class="menu-item__dropdown"><a href="javascript:void(0)"><i class="icon-truck"></i></a>
              <ul>
                @foreach ($orders as $order)
                  <li><a href="/order/{{$order->id_transaction}}">#{{$order->id_transaction}}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="/troli"><i class="icon-basket"></i></a></li>
            <li><a href="/balance">IDR [ {{number_format($user->saldo,2)}} ]</a></li>
            <li class="menu-item__dropdown"><a href="javascript:void(0)"> {{Session::get('username')}} </a>
              <ul style="right:0">
                {{-- <li><a href="/account"><i class="icon-"></i> Account</a></li> --}}
                <li><a href="/logout"><i class="icon-logout"></i> Logout</a></li>
                @if($user->role > 0)
                <li><a href="/admin">Admin Panel</a></li>
                @endif
              </ul>
            </li>
          </ul>

        @else

          <ul class="menu-item">
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
          </ul>
        @endif
      </div>
    </nav>
    <div class="menu">
      <ul class="menu-item">
        <li><a href="/">Terbaru</a></li>
        <li><a href="/cat/smartphone">Smartphone</a></li>
        <li><a href="/cat/laptop">Laptop</a></li>
        <li><a href="/cat/pc">PC</a></li>
        <li><a href="/cat/tablet">Tablet</a></li>
        <li><a href="/cat/gaming">Gaming</a></li>
        <li><a href="/cat/wearable">Wearable</a></li>
      </ul>
    </div>
