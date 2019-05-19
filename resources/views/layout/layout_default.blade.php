<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <!-- hedader(未実装) -->
        </header>
        <main>
            @section('sidebar')
                <!-- sidebar(未実装) -->
            @show
            
            <div class="main">
                @yield('content')
            </div>
        </main>
        <footer>
            <!-- footer（未実装）-->
        </footer>
    </body>
</html>