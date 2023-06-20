@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Usuário logado: <?php echo $_SESSION['username']; ?>. Cliente: <?php echo $_SESSION['nomecliente']; ?></p>

<h1>Clientes</h1>
</br>

<a href=" {{ route('cliente.create') }} " class="btn btn-primary">Cadastrar um cliente</a>
</br></br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Nome</th>
            <th scope="col">Usuário</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
            @if ($cliente->id == $_SESSION['idcliente'] || $_SESSION['idcliente'] == 1)
            <tr>
                <td><a class="nav-link">{{ $cliente->id }}</a></td>
                <td><a class="nav-link">{{ $cliente->cnpj }}</a></td>
                <td><a class="nav-link">{{ $cliente->nome }}</a></td>
                <td><a class="nav-link">{{ $cliente->idusuario }}</a></td>
                <td><a class="nav-link">{{ $cliente->status }}</a></td>
                <td>
                    <a href=" {{ route('cliente.show', ['id' => $cliente->id]) }} "><button type="button" class="btn btn-primary">Ver</button></a>
                    <a href=" {{ route('cliente.edit', ['id' => $cliente->id]) }} "><button type="button" class="btn btn-outline-primary">Editar</button></a>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>

@endsection