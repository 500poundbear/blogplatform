<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NamBlog - @yield('title')</title>
    <link rel="stylesheet" href="{{$url = asset('foundation-6/css/app.css')}}" />
    <link rel="stylesheet" href="{{$url = asset('foundation-6/css/foundation.min.css')}}" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
    <style>
    body {
      background: #F0F0F3;
    }
    .login-box {
      background: #fff;
      border: 1px solid #ddd;
      margin: 100px 0;
      padding: 40px 20px 0 20px;
    }
    </style>
  </head>
  <body>
    <div class="large-3 large-centered columns">
      <div class="login-box">
      <div class="row" style="margin-bottom: 10px;">
        <center><b>The Best Ever</b></center>
      </div>
      <div class="row" style="margin-bottom: 10px; font-size: 10px;">
        <center>user: abc@asdf.com pwd: abc123</center>
      </div>
      <div class="row">
      <div class="large-12 columns">
        <form method="POST" action="/auth/login">
          {!! csrf_field() !!}
          <div class="row">
            <div class="large-12 columns">
              <input type="email" name="email" value="{{ old('email') }}">
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <input type="password" name="password" id="password" />
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <input type="checkbox" name="remember" /> Remember me?
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns expand">
              <center>
                <input type="submit" class="button expand" value="Log In"/>
              </center>
            </div>
          </div>
        </form>
      </div>
      </div>
      </div>
    </div>
    <a href="{{route('auth.register')}}">Register</a>
  </body>
</html>
