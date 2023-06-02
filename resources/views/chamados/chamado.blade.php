@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    <h1>Detalhes do chamado</h1>

    <p>Exibindo chamado id: {{ $id }}</p>

    </br>
    <a href="/">Voltar à página inicial</a>

@endsection