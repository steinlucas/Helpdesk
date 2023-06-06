@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="usuario-index-container" class="col-md-6 offset-md-3">

    <h1>Listagem de Usuários</h1>
    </br>
    </br>

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
            <th scope="row">{{ $usuario->nome }}</th>
            <td>{{ $usuario->username }}</td>
            <td>{{ $usuario->password }}</td>
            <td><a href="#"><i class="material-icons">lock</i></a></td>
        </tr>
        @endforeach

        </tbody>
    </table>
    </br>
    <a href="/">Voltar à página inicial</a>
    
@endsection