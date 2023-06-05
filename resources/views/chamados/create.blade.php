@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    

    <div id="chamado-reate-container" class="col-md-6 offset-md-3">
        <h1>Abertura de chamado</h1>

        <form action="/chamados" method="POST"></form>
    </div>

    <input type="text">

    </br>
    <a href="/">Voltar à página inicial</a>
    
@endsection