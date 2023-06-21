@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Cliente: <?php echo $_SESSION['nomecliente']; ?></p>
<p>Usuário: <?php echo $_SESSION['username']; ?> - Nome: <?php echo $_SESSION['nome']; ?></p>

<h1>Detalhes do cliente</h1>
</br>

@if ($cliente->id == $_SESSION['idcliente'] || $_SESSION['idcliente'] == 1)
    <div class="form-group">
        <label for="id">Id</label>
        <input readonly type="text" class="form-control" id="id" name="id" value="{{ $cliente->id }}">
    </div>
    </br>

    <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input readonly type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $cliente->cnpj }}">
    </div>
    </br>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input readonly type="text" class="form-control" id="nome" name="nome" value="{{ $cliente->nome }}">
    </div>
    </br>

    <div class="form-group">
        <label for="username">Usuário</label>
        <input readonly type="text" class="form-control" id="username" name="username" value="{{ $cliente->idusuario }}">
    </div>
    </br>

    <div class="col">
        <label for="status">Status</label>
        <input readonly type="text" class="form-control" id="status" name="status" value="{{ $cliente->status }}">
    </div>
    </br>

    </br>
    <a href=" {{ route('cliente.index') }} " class="btn btn-primary">Voltar</a>

@endif
@endsection