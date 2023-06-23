@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Cliente: <?php echo $_SESSION['nomecliente']; ?></p>
<p>Usuário: <?php echo $_SESSION['username']; ?> - Nome: <?php echo $_SESSION['nome']; ?></p>

<h1>Atualizar usuário</h1>
</br>

<form action="{{ route('usuario.update') }}" method="POST">
    @csrf
    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $usuario->id }}">

    <label @if ($_SESSION['username'] != "admin" or $usuario->id == 1) hidden @endif >Status</label>
    <select @if ($_SESSION['username'] != "admin" or $usuario->id == 1) hidden @endif name="status">
        <option value="0" @if ($usuario->status == 0) selected="selected" @endif>Desativado</option>
        <option value="1" @if ($usuario->status == 1) selected="selected" @endif>Ativado</option>
    </select>

    @if ($_SESSION['username'] == "admin" and $usuario->id != 1)
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

    <a href=" {{ route('usuario.index') }} " class="btn btn-outline-primary">Voltar</a>
    <input type="submit" class="btn btn-primary" value="Atualizar usuário">
</form>

@endsection