@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<h1>Cadastro de usuário</h1>
</br>

<form action="{{ route('usuario.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nome">Nome</label>
        <input required type="text" class="form-control" id="nome" name="nome" placeholder="Nome do usuário">
    </div>
    </br>

    <div class="form-group">
        <label for="username">Usuário</label>
        <input required type="text" class="form-control" id="username" name="username" placeholder="Usuário">
    </div>
    </br>

    <div class="form-group">
        <label for="password">Senha</label>
        <input required type="password" class="form-control" id="password" name="password" placeholder="Senha">
    </div>
    </br>

    <label>Tipo usuário</a>
    <select name="tipoUsuario">
        @foreach($tiposUsuarios as $tipoUsuario)
            <option value="{{ $tipoUsuario->id }}">{{ $tipoUsuario->description }}</option>
        @endforeach
    </select>
    </br>
    
    </br>
    <a href=" {{ route('usuario.index') }} " class="btn btn-outline-primary">Voltar</a>
    <input type="submit" class="btn btn-primary" value="Gravar">
</form>

@endsection