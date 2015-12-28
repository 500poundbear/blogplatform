<!-- Stored in resources/views/layouts/main.blade.php -->

<html>
    <head>
        <title>NamBlog - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            <a href="/blogs">Blogs</a>
            
        @show

        <div class="container">

            @yield('content')
        </div>
    </body>
</html>¯
