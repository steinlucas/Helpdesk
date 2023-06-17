@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    <h1>Detalhes do chamado</h1>
    </br>

    <div class="row">
        <div class="col-md-1">
            <label for="id">Id</label>
            <input readonly type="text" class="form-control" id="id" name="id" value="{{ $chamado->id }}">
        </div>

        <div class="col">
            <label for="status">Status</label>
            <input readonly type="text" class="form-control" id="usuarioAbriu" name="usuarioAbriu" value="{{ $chamado->status }}">
        </div>

        <div class="col">
            <label for="atendenteResponsavel">Atendente</label>
            <input readonly type="text" class="form-control" id="atendenteResponsavel" name="atendenteResponsavel" value="{{ $chamado->atendenteResponsavel }}">
        </div>

        <div class="col">
            <label for="usuarioAbriu">Usuário que abriu</label>
            <input readonly type="text" class="form-control" id="usuarioAbriu" name="usuarioAbriu" value="{{ $chamado->usuarioAbriu }}">
        </div>

        <div class="col">
            <label for="usuarioAbriu">Data de abertura</label>
            <input readonly type="text" class="form-control" id="usuarioAbriu" name="usuarioAbriu" value="{{ $chamado->created_at->format("d-m-Y h:i:s") }}">
        </div>

    </div>
    </br>

    <div class="form-group">
        <label for="nome">Título</label>
        <input readonly type="text" class="form-control" id="titulo" name="titulo" value="{{ $chamado->titulo }}">
    </div>
    </br>

    <div class="form-group">
        <label for="username">Descrição</label>
        <textarea readonly type="textarea" class="form-control" id="description" name="description" rows="5">{{ $chamado->descricao }}</textarea>
    </div>
    </br>

    <a href=" {{ route('chamado.index') }} " class="btn btn-outline-primary">Voltar</a>
    @if ($chamado->status == "Aberto")
        <a href="/chamados/close/{{$chamado->id}}"><button type="button" class="btn btn-secondary">Encerrar</button></a>
    @endif

@endsection