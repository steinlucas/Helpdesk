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
    <header>
        <div class="fixed-top my-navbar">
            <div class="container">
                <div>
                    <a href="{{ route('chamado.index') }}"><button type="button" class="btn btn-light">Chamados</button></a>
                    <a href="{{ route('usuario.index') }}"><button type="button" class="btn btn-light">Usuários</button></a>
                </div>
            </div>
        </div>
    </header>
    </br></br></br>

    <div id="site" class="container">
    
    @yield('content')

    </div><!-- class="container" -->

    </br></br></br>
    <footer>
        <div class="my-navbar">
            <div class="container">
                <div class="text-center texto-rodape">
                    Helpdesk do Lucas Stein &copy; 2023
                    <a class="text-reset fw-bold" href="https://github.com/steinlucas" target="_blank">github.com/steinlucas</a>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>