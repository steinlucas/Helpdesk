@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')
    <div id="chamados-index-container" class="col-md-6 offset-md-3">

    <h1>Chamados</h1>

    <a href="/chamados/create">Abrir novo chamado</a>
    </br>
    <a href="/chamados/close">Encerrar chamado</a>
    </br>

    <br>
    </br>

    <a href="/usuarios/index">Listar usuários</a>
    </br>
    <a href="/usuarios/create">Criar usuário</a>

    </br>
    </br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Número</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>

        @foreach($chamados as $chamado)
        <tr>
            <th scope="row">{{ $chamado->id }}</th>
            <td>{{ $chamado->titulo }}</td>
            <td>{{ $chamado->descricao }}</td>
            <td><a href="#"><i class="material-icons">lock</i></a></td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection