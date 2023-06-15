<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fontes do Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        
        <!-- Fontes da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
    <div id="site" class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Chamados</a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('usuario.index') }} " class="nav-link">Usuários</a>
                        </li>
                    <ul>
                </div>
        </header>

        @yield('content')

        <footer class="text-center text-white fixed-bottom">
            </br>
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.3);">
                Helpdesk do Lucas Stein &copy; 2023
                <a class="text-reset fw-bold" href="https://github.com/steinlucas">github.com/steinlucas</a>
            </div>
        </footer>

    </div><!-- class="container" -->
    </body>
</html>