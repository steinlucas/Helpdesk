@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    <h1>Chamados</h1>

    <a href="/chamados/create">Abrir novo chamado</a>
    </br>
    <a href="/chamados/close">Encerrar chamado</a>
    </br>
    <a href="/chamados/details">Detalhar chamado</a>

    </br>
    </br>

    <a href="/usuarios">Listar usuários</a>
    </br>
    <a href="/usuarios/create">Criar usuário</a>

@endsection