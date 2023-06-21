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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        
        <!-- Fontes da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <div class="login-container">
            <h1 class="center-title">Bem-vindo ao seu HelpDesk</h1>
            </br>

            <h5 class="center-subtitle">Login</h5>
            <form action="{{ route('session.login') }}" method="POST">
                @csrf
                <div class="form-group col-md-3 center-username">
                    <label for="txUsuario">Usuário</label>
                    <input type="text" class="form-control" name="username" id="txUsuario" maxlength="25">
                </div>
                </br>

                <div class="form-group col-md-3 center-password">
                    <label for="txSenha">Senha</label>
                    <input type="password" class="form-control" name="password" id="txSenha" maxlength="25">
                </div>
                </br>

                <input type="submit" class="btn btn-primary center-button" value="Entrar">
            </form>
        </div>
    </body>
</html>