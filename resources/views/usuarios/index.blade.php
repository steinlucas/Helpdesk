@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="usuario-index-container" class="container">

    <h1>Usuários</h1>
    </br>

    <a href="/usuarios/create" class="btn btn-primary">Criar um usuário</a>
    </br></br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Usuário</th>
                <th scope="col">Senha</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>

        @foreach($usuarios as $usuario)
        <tr>
            <td><a href="/usuarios/{{ $usuario->id }}" class="nav-link">{{ $usuario->nome }}</a></td>
            <td><a href="/usuarios/{{ $usuario->id }}" class="nav-link">{{ $usuario->username }}</a></td>
            <td><a href="/usuarios/{{ $usuario->id }}" class="nav-link">{{ $usuario->password }}</a></td>
            <td>
            @if ($usuario->status == true)
                <a href="/usuarios/inactivate/{{$usuario->id}}"><i class="material-icons">lock</i></a>
            @else
                <a href="/usuarios/activate/{{$usuario->id}}"><i class="material-icons">lock_open</i></a>
            @endif
            <a href="/usuarios/{{ $usuario->id }}"><i class="material-icons">edit</i></a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    </br>
    <a href="/">Voltar à página inicial</a>
    
@endsection