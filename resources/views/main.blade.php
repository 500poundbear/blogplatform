<!-- Stored in resources/views/layouts/main.blade.php -->
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
  </head>
  <body>
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
          <li class="menu-text">Welcome, {{$user['name']}}  (id: {{$user['id']}})</li>
          <li><a href="/blogs">Blogs</a></li>
          <li><a href="{{route('blogs.create')}}">Create Blog</a></li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">

        </ul>
      </div>
    </div>
    <div class="row">
      <div class="large-8 columns">
        <h1>Dashboard</h1>
      </div>
      <div class="large-4 columns">
        <form action="{{ route('auth.logout')}}" method="POST">
          <input type="submit" class="button"></input>
        </form>
      </div>
    </div>

    @section('sidebar')

    @show

    <div class="container row">
      @yield('content')
    </div>
  </body>
</html>¯
