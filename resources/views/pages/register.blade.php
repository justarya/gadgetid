<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="/vendors/fontello/css/fontello.css"/>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form class="" action="/registerForm" method="post">
      <p style="display: inline-block;">
          <a href="/" class="button button--back"><i class="icon-right-open"></i>Home</a>
        </p>
      {{ csrf_field() }}
      <div class="form__title">
        <h1>Register</h1>
      </div>
      <div class="form__input">
        <input type="text" name="email" placeholder="Email" autocomplete="on" value="{{ old('email') }}">
        <input type="text" name="username" placeholder="Username" autocomplete="on" value="{{ old('username') }}">
        <input type="password" name="password" placeholder="Password" autocomplete="off" value="">
        <input type="password" name="repassword" placeholder="Re-Password" autocomplete="off" value="">
        <input type="text" name="nama" placeholder="Nama" autocomplete="on" value="{{ old('nama') }}">
        <h2 class="form__pemisah">Alamat Pengiriman</h2>
        <textarea name="alamat" rows="8" cols="80" placeholder="Alamat"> {{ old('alamat') }}</textarea>
        <input type="number" name="no_telp" placeholder="Nomor Handphone" autocomplete="on" value="{{ old('no_telp') }}">
        <input type="submit" name="submit" value="Login">
      </div>
      <div class="form__info">
        <p>Sudah punya akun? <a href="/login">Login</a> aja!</p>
      </div>
    </form>
  </body>
</html>
