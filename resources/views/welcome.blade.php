<!-- Stored in resources/views/layouts/main.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            NamBlog.
            <a href="/auth/login">Login</a><br>
            <a href="/auth/register">Register</a><br>
        @show
        
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>¯
