@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="usuario-details-container" class="container">

    <h1>Detalhes do usuário</h1>

    </br>
    <form action="/usuarios" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input required type="text" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}">
            </div>
            </br>
            <div class="form-group">
                <label for="username">Usuário</label>
                <input required type="text" class="form-control" id="username" name="username" placeholder="Usuário">
            </div>
            </br>
            <div class="form-group">
                <label for="password">Descrição</label>
                <input required type="password" class="form-control" id="password" name="password" placeholder="Senha">
            </div>
            </br>
            <input type="submit" class="btn btn-primary" value="Atualizar usuário">
        </form>
    </br>
    
    <a href="/">Voltar à página inicial</a>
    
@endsection