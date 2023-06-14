@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="usuario-details-container" class="container">

    <h1>Atualizar usuário</h1>

    </br>
    
    <form action="{{ route('usuario.update') }}" method="POST">
        @csrf
        <input hidden type="text" class="form-control" id="id" name="id" value="{{ $usuario->id }}">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input required type="text" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}">
        </div>
        </br>
        <div class="form-group">
            <label for="username">Usuário</label>
            <input required type="text" class="form-control" id="username" name="username" value="{{ $usuario->username }}">
        </div>
        </br>
        <div class="form-group">
            <label for="password">Senha</label>
            <input required type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>
        </br>
        <input type="submit" class="btn btn-success" value="Atualizar usuário">

        <a href=" {{ route('usuario.index') }} " class="btn btn-outline-primary">Voltar</a>
    </form>

@endsection