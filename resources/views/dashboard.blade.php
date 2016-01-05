<!-- Stored in resources/views/layouts/main.blade.php -->

<html>
    <head>
        <title>Dashboard - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')

        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>¯
