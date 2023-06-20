@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Usuário logado: <?php echo $_SESSION['username']; ?>. Cliente: <?php echo $_SESSION['nomecliente']; ?></p>

<h1>Atualizar usuário</h1>
</br>

<form action="{{ route('usuario.update') }}" method="POST">
    @csrf
    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $usuario->id }}">

    @if ($_SESSION['username'] == "admin")
        <label>Status</a>
        <select name="status">
            <option value="0" @if ($usuario->status == 0) selected="selected" @endif>Desativado</option>
            <option value="1" @if ($usuario->status == 1) selected="selected" @endif>Ativado</option>
        </select>
        </br>
        </br>
    @endif

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
        <input required type="password" class="form-control" id="password" name="password" value="{{ $usuario->password }}">
    </div>
    </br>

    <label @if ($_SESSION['username'] <> "admin") hidden @endif>Tipo usuário</label>
    <select @if ($_SESSION['username'] <> "admin") hidden @endif name="tipoUsuario">
        @foreach($tiposUsuario as $tipoUsuario)
            <option 
            @if ($usuario->tipoUsuario == $tipoUsuario->id)
                selected="selected"
            @endif
            value="{{ $tipoUsuario->id }}">{{ $tipoUsuario->description }}</option>
        @endforeach
    </select>

    </br>
    </br>

    <a href=" {{ route('usuario.index') }} " class="btn btn-outline-primary">Voltar</a>
    <input type="submit" class="btn btn-primary" value="Atualizar usuário">
</form>

@endsection