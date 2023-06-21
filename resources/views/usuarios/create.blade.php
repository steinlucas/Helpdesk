@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Cliente: <?php echo $_SESSION['nomecliente']; ?></p>
<p>Usuário: <?php echo $_SESSION['username']; ?> - Nome: <?php echo $_SESSION['nome']; ?></p>

<h1>Cadastro de usuário</h1>
</br>
@if ($_SESSION['username'] == "admin")
    <form action="{{ route('usuario.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input required type="text" class="form-control" id="nome" name="nome" placeholder="Nome do usuário">
        </div>
        </br>

        <div class="form-group">
            <label for="username">Usuário</label>
            <input required type="text" class="form-control" id="username" name="username" placeholder="Usuário">
        </div>
        </br>

        <div class="form-group">
            <label for="password">Senha</label>
            <input required type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>
        </br>

        <label>Tipo usuário</a>
        <select name="tipoUsuario">
            @foreach($tiposUsuarios as $tipoUsuario)
                <option value="{{ $tipoUsuario->id }}">{{ $tipoUsuario->description }}</option>
            @endforeach
        </select>
        </br>
        
        </br>
        <a href=" {{ route('usuario.index') }} " class="btn btn-outline-primary">Voltar</a>
        <input type="submit" class="btn btn-primary" value="Gravar">
    </form>
@else
    <p>Apenas o usuário administrador do sistema tem acesso à esta tela.</p>
    </br><a href=" {{ route('usuario.index') }} " class="btn btn-outline-primary">Voltar</a>
@endif

@endsection