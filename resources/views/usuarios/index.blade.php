@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="usuario-index-container" class="container">

    <h1>Usuários</h1>
    </br>

    <a href=" {{ route('usuario.create') }} " class="btn btn-primary">Criar um usuário</a>
    </br></br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Usuário</th>
                <th scope="col">Senha</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td><a class="nav-link">{{ $usuario->id }}</td>
                <td><a class="nav-link">{{ $usuario->nome }}</td>
                <td><a class="nav-link">{{ $usuario->username }}</td>
                <td><a class="nav-link">{{ $usuario->password }}</td>
                <td>
                    <a href=" {{ route('usuario.show', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-primary">Ver</button></a>
                    <a href=" {{ route('usuario.edit', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-outline-primary">Editar</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection