@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="usuario-details-container" class="container">

    <h1>Detalhes do usuário</h1>
    </br>
    
    <input readonly type="text" class="form-control" id="id" name="id" value="{{ $usuario->id }}">
    </br>

    <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="status" id="flexCheckDefault" @if ($usuario->status == true) checked @endif >
            <label class="form-check-label" for="flexCheckDefault">
                Usuário ativado?
            </label>
        </div>
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
    </br>

    <a href=" {{ route('usuario.index') }} " class="btn btn-primary">Voltar</a>

@endsection