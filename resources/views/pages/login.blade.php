<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/vendors/fontello/css/fontello.css"/>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <form class="" action="/loginForm" method="post">
      <p style="display: inline-block;">
        <a href="/" class="button button--back"><i class="icon-right-open"></i>Home</a>
      </p>
      <div class="form__title">
        <h1>Login</h1>
      </div>
      @if(\Session::has('alert'))
      <div class="alert alert-danger">
          <div>{{Session::get('alert')}}</div>
      </div>
      @endif
      @if(\Session::has('alert-success'))
          <div class="alert alert-success">
              <div>{{Session::get('alert-success')}}</div>
          </div>
      @endif
      {{ csrf_field() }}
      <div class="form__input">
        <input type="text" name="username" placeholder="Username" autocomplete="off" value="{{ old('username')}}">
        <input type="password" name="password" placeholder="Password" autocomplete="off">
        <input type="submit" name="submit" value="Login">
      </div>
      <div class="form__info">
        <p>Tidak punya akun? <a href="/register">Register</a> Yuk!</p>
      </div>
    </form>
  </body>
</html>
