@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="chamado-create-container" class="col-md-6 offset-md-3">

    <h1>Abertura de chamado</h1>

    <form action="/chamados" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do chamado">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do chamado"></textarea>
        </div>

        <br>
        <input type="submit" class="btn btn-primary" value="Abrir chamado"></input>
        <a href="{{ route('chamado.index') }}" class="btn btn-danger">Cancelar</a>
    </form>

@endsection