@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="chamados-create-container" class="container">

    <h1>Abertura de chamado</h1>
    </br>

    <form action="{{ route('chamado.store') }}" method="POST">
        @csrf

        <div class="col">
            <label for="usuarioAbriu">Usuário de abertura</label>
            <input readonly type="text" class="form-control" id="usuarioAbriu" name="usuarioAbriu">
        </div>

        <label>Cliente do chamado</a>
        <select name="clienteChamado">
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->username }}</option>
            @endforeach
        </select>

        <label>Atendente do chamado</a>
        <select name="atendenteChamado">
            @foreach($atendentes as $atendente)
                <option value="{{ $atendente->id }}">{{ $atendente->username }}</option>
            @endforeach
        </select>

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do chamado">
        </div>
        </br>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do chamado"></textarea>
        </div>
        </br>

        <input type="submit" class="btn btn-primary" value="Abrir chamado"></input>
        
        <a href="{{ route('chamado.index') }}" class="btn btn-danger">Cancelar</a>
    </form>

@endsection