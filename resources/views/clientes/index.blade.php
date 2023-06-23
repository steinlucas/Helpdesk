@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Cliente: <?php echo $_SESSION['nomecliente']; ?></p>
<p>Usuário: <?php echo $_SESSION['username']; ?> - Nome: <?php echo $_SESSION['nome']; ?></p>

<h1>Clientes</h1>
</br>

<p>Com um usuário cliente ou atendente logado, tentar acessar http://localhost:8000/clientes/create</p>

@if ($_SESSION['username'] == "admin")
    <a href=" {{ route('cliente.create') }} " class="btn btn-primary">Cadastrar um cliente</a>
    </br></br>
@endif
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
                <td><a class="nav-link">@if ($cliente->status == 1) Ativado @else Desativado @endif</a></td>
                <td>
                    <a href=" {{ route('cliente.show', ['id' => $cliente->id]) }} "><button type="button" class="btn btn-primary">Ver</button></a>
                    <a href=" {{ route('cliente.edit', ['id' => $cliente->id]) }} "><button type="button" class="btn btn-outline-primary">Editar</button></a>
                    @if ($_SESSION['username'] == "admin" and $cliente->id != 1)
                        @if ($cliente->status == 0)
                            <a href=" {{ route('cliente.enable', ['id' => $cliente->id]) }} "><button type="button" class="btn btn-outline-primary">Ativar</button></a>
                        @else
                            <a href=" {{ route('cliente.disable', ['id' => $cliente->id]) }} "><button type="button" class="btn btn-outline-primary">Desativar</button></a>
                        @endif
                    @endif
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>

@endsection