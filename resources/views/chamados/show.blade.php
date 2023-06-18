@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    <h1>Detalhes do chamado</h1>
    </br>

    <h4>Chamado</h4>
    <div class="row">
        <div class="col">
            <label for="id">Id</label>
            <input readonly type="text" class="form-control" id="id" name="id" value="{{ $chamado->id }}">
        </div>

        <div class="col">
            <label for="status">Status</label>
            <input readonly type="text" class="form-control" id="status" name="status" value="{{ $chamado->status }}">
        </div>

        <div class="col">
            <label for="dataAbertura">Data de abertura</label>
            <input readonly type="text" class="form-control" id="dataAbertura" name="dataAbertura" value="{{ $chamado->created_at->format("d/m/Y") }} às {{ $chamado->created_at->format("h:i:s") }}">
        </div>
    </div>
    </br>

    <div class="row">
        <div class="col">
            <label for="cliente">Cliente</label>
            <input readonly type="text" class="form-control" id="cliente" name="cliente" value="{{ $chamado->cliente }}">
        </div>

        <div class="col">
            <label for="usuarioAbriu">Quem abriu</label>
            <input readonly type="text" class="form-control" id="usuarioAbriu" name="usuarioAbriu" value="{{ $chamado->usuarioAbriu }}">
        </div>

        <div class="col">
            <label for="atendenteResponsavel">Atendente</label>
            <input readonly type="text" class="form-control" id="atendenteResponsavel" name="atendenteResponsavel" value="{{ $chamado->atendenteResponsavel }}">
        </div>
    </div>
    </br>

    <div class="form-group">
        <label for="titulo">Título</label>
        <input readonly type="text" class="form-control" id="titulo" name="titulo" value="{{ $chamado->titulo }}">
    </div>
    </br>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea readonly type="textarea" class="form-control" id="descricao" name="descricao" rows="5">{{ $chamado->descricao }}</textarea>
    </div>
    </br>

    <a href=" {{ route('chamado.index') }} " class="btn btn-outline-primary">Voltar</a>
    @if ($chamado->status == "Aberto")
        <a href=" {{ route('chamado.close', ['id' => $chamado->id]) }} "><button type="button" class="btn btn-outline-primary">Encerrar</button></a>
    @endif
    </br>

    </br>
    <h4>Trâmites</h4>
    @foreach ($tramites as $tramite)
        <label for="tramite">Trâmite {{ $tramite->seqtramite }}. Escrito por {{ $tramite->idusuario }} em {{ $tramite->created_at->format("d/m/Y") }} às {{ $tramite->created_at->format("h:i:s") }}.</label>
        </br></br>
        <div class="form-group">
            <textarea readonly type="textarea" class="form-control" id="tramite" name="tramite" rows="5">{{ $tramite->descricao }}</textarea>
        </div>
        </br>
    @endforeach
    
    <a href=" {{ route('chamado.index') }} " class="btn btn-outline-primary">Voltar</a>
@endsection