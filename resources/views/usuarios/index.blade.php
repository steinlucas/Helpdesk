@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<h1>Usuários</h1>
</br>

<a href=" {{ route('usuario.create') }} " class="btn btn-primary">Cadastrar um usuário</a>
</br></br>

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
        <tr>
            <td><a class="nav-link">{{ $usuario->id }}</a></td>
            <td><a class="nav-link">{{ $usuario->nome }}</a></td>
            <td><a class="nav-link">{{ $usuario->username }}</a></td>
            <td><a class="nav-link">{{ $usuario->idcliente }}</a></td>
            <td><a class="nav-link">{{ $usuario->tipoUsuario }}</a></td>
            <td><a class="nav-link">{{ $usuario->status }}</a></td>
            <td><a class="nav-link">{{ $usuario->created_at->format("d/m/Y") }}</a></td>
            <td>
                <a href=" {{ route('usuario.show', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-primary">Ver</button></a>
                <a href=" {{ route('usuario.edit', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-outline-primary">Editar</button></a>
                @if ($usuario->status == "Desativado")
                    <a href=" {{ route('usuario.enable', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-outline-primary">Ativar</button></a>
                @else
                    <a href=" {{ route('usuario.disable', ['id' => $usuario->id]) }} "><button type="button" class="btn btn-outline-primary">Desativar</button></a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection