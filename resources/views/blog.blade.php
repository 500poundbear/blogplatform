<!-- Stored in resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<head>
  <meta charset="utf-8"/>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{$url = asset('tufte.css')}}"/>
  <link rel="stylesheet" href="{{$url = asset('latex.css')}}"/>

  <style>
    * {
      margin: 0px;
      padding: 0px;
    }
    body{
        background-color: black;
        background-image: url("{{$url = asset('congruent_outline.png')}}");
        background-repeat: repeat;
    }

  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
  <script src="{{$url = asset('jquery.tubular.1.0.1/js/jquery.tubular.1.0.js')}}" type="text/javascript"></script>

</head>

<body>
  <div class="woop">
    @section('navigation')
    @show

    <div class="container">
        @if (isset($user['name']))
            <span><a href="{{route('blogs.manage', [$blog->slug])}}">Back to Dashboard</a></span>
        @else
        @endif

        @yield('content')

    </div>
  </div>
</body>
</html>
