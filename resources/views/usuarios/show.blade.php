@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    <h1>Detalhes do usuário</h1>
    </br>
    
    <div class="form-group">
        <label for="id">Id</label>
        <input readonly type="text" class="form-control" id="id" name="id" value="{{ $usuario->id }}">
    </div>
    </br>

    <div class="col">
        <label for="status">Status</label>
        <input readonly type="text" class="form-control" id="status" name="status" value="{{ $usuario->status }}">
    </div>
    </br>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input readonly type="text" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}">
    </div>
    </br>

    <div class="form-group">
        <label for="nome">Nome cliente</label>
        <input readonly type="text" class="form-control" id="nomecliente" name="nomecliente" value="{{ $usuario->idcliente }}">
    </div>
    </br>

    <div class="form-group">
        <label for="username">Usuário</label>
        <input readonly type="text" class="form-control" id="username" name="username" value="{{ $usuario->username }}">
    </div>
    </br>

    <div class="form-group">
        <label for="id">Tipo usuário</label>
        <input readonly type="text" class="form-control" id="tipoUsuario" name="tipoUsuario" value="{{ $usuario->tipoUsuario }}">
    </div>
    </br>

    <a href=" {{ route('usuario.index') }} " class="btn btn-primary">Voltar</a>

@endsection