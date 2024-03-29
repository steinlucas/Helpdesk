@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Cliente: <?php echo $_SESSION['nomecliente']; ?></p>
<p>Usuário: <?php echo $_SESSION['username']; ?> - Nome: <?php echo $_SESSION['nome']; ?></p>

<h1>Cadastro de cliente</h1>
</br>
    @if ($_SESSION['username'] == "admin")
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input required type="number" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ do cliente">
        </div>
        </br>

        <div class="form-group">
            <label for="nome">Nome do cliente</label>
            <input required type="text" class="form-control" id="nome" name="nome" placeholder="Nome do cliente">
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

        <label>Tipo usuário</label>
        <select name="tipoUsuario">
                <option value="3">Cliente</option>
        </select>
        </br></br>

        <label>Status</label>
        <select name="status">
            <option value="1" selected>Ativado</option>    
            <option value="0">Desativado</option>
        </select>
        </br></br>

        </br>
        <a href=" {{ route('cliente.index') }} " class="btn btn-outline-primary">Voltar</a>
        <input type="submit" class="btn btn-primary" value="Gravar"></input>
    </form>
    @else
        <p>Apenas o usuário administrador do sistema tem acesso à esta tela.</p>

        </br><a href=" {{ route('cliente.index') }} " class="btn btn-outline-primary">Voltar</a>
    @endif

@endsection