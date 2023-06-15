@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="chamado-details-container" class="container">

    <h1>Detalhes do chamado</h1>
    </br>

    <div class="row">
        <div class="col-md-1">
            <label for="id">Id</label>
            <input readonly type="text" class="form-control" id="id" name="id" value="{{ $chamado->id }}">
        </div>

        <div class="col">
            <label for="atendenteResponsavel">Atendente responsável</label>
            <input readonly type="text" class="form-control" id="atendenteResponsavel" name="atendenteResponsavel" value="{{ $chamado->atendenteResponsavel }}">
        </div>

        <div class="col">
            <label for="usuarioAbriu">Usuário que abriu</label>
            <input readonly type="text" class="form-control" id="usuarioAbriu" name="usuarioAbriu" value="{{ $chamado->usuarioAbriu }}">
        </div>

    </div>
    </br>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" name="status" id="flexCheckDefault" @if ($chamado->status == true) checked @endif >
        <label class="form-check-label" for="flexCheckDefault">
            Chamado aberto?
        </label>
    </div>
    </br>

    <div class="form-group">
        <label for="nome">Título</label>
        <input readonly type="text" class="form-control" id="titulo" name="titulo" value="{{ $chamado->titulo }}">
    </div>
    </br>

    <div class="form-group">
        <label for="username">Descrição</label>
        <textarea readonly type="textarea" class="form-control" id="description" name="description" value="{{ $chamado->description }}" rows="5"></textarea>
    </div>
    </br>


    <a href=" {{ route('usuario.index') }} " class="btn btn-primary">Voltar</a>

@endsection