@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="chamados-index-container" class="container">

    <h1>Chamados</h1>
    </br>
    
    <a href="/chamados/create" class="btn btn-primary">Abrir um chamado</a>
    </br></br>

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
                <td><a href="/chamados/{{ $chamado->id }}" class="nav-link">{{ $chamado->id }}</td></a>
                <td><a href="/chamados/{{ $chamado->id }}" class="nav-link">{{ $chamado->titulo }}</a></td>
                <td><a href="/chamados/{{ $chamado->id }}" class="nav-link">{{ $chamado->descricao }}</a></td>
                <td><a href="/tramites/edit/{{ $chamado->id }}"><i class="material-icons">reply</i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection