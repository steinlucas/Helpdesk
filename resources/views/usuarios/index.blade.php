@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Usuário logado: <?php echo $_SESSION['username']; ?>. Cliente: <?php echo $_SESSION['nomecliente']; ?></p>

<h1>Usuários</h1>
</br>

<p>Com um usuário cliente ou atendente logado, tentar acessar http://localhost:8000/usuarios/create</p>

@if ($_SESSION['username'] == "admin")
    <a href=" {{ route('usuario.create') }} " class="btn btn-primary">Cadastrar um usuário</a>
    </br></br>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Usuário</th>
            <th scope="col">Cliente</th>
            <th scope="col">Tipo usuário</th>
            <th scope="col">Status</th>
            <th scope="col">Criado em</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        @if ($_SESSION['username'] == "admin" || ($usuario->idcliente == $_SESSION['idcliente']) || ($usuario->username == $_SESSION['username']))
            <tr>
                <td><a class="nav-link">{{ $usuario->id }}</a></td>
                <td><a class="nav-link">{{ $usuario->nome }}</a></td>
                <td><a class="nav-link">{{ $usuario->username }}</a></td>
                <td><a class="nav-link">{{ $usuario->idcliente }}</a></td>
                <td><a class="nav-link">{{ $usuario->tipoUsuario }}</a></td>
                <td><a class="nav-link">@if ($usuario->status == 1) Ativado @else Desativado @endif</a></td>
                <td><a class="nav-link">{{ $usuario->created_at->format("d/m/Y") }}</a></td>
                <td>
                    <a href=" {{ route('usuario.show', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-primary">Ver</button></a>
                    <a href=" {{ route('usuario.edit', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-outline-primary">Editar</button></a>
                    @if ($_SESSION['username'] == "admin")
                        @if ($usuario->status == 0)
                            <a href=" {{ route('usuario.enable', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-outline-primary">Ativar</button></a>
                        @else
                            <a href=" {{ route('usuario.disable', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-outline-primary">Desativar</button></a>
                        @endif
                    @endif
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>

@endsection