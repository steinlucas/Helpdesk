@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="usuario-details-container" class="container">

    <h1>Detalhes do usuário</h1>
    </br>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input readonly type="text" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}">
    </div>
    </br>
    <div class="form-group">
        <label for="username">Usuário</label>
        <input readonly type="text" class="form-control" id="username" name="username" value="{{ $usuario->username }}">
    </div>

@endsection