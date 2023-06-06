@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    <div id="usuario-reate-container" class="col-md-6 offset-md-3">
        <h1>Criação de usuário</h1>

        <form action="/usuarios" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do usuário">
            </div>

            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Usuário">
            </div>

            <div class="form-group">
                <label for="password">Descrição</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
            </div>

            <input type="submit" class="btn btn-primary" value="Criar usuário">
        </form>
    </br>
    
    <a href="/">Voltar à página inicial</a>

@endsection