@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    <h1>Atualizar cliente</h1>
    </br>
    
    <form action="{{ route('cliente.update') }}" method="POST">
        @csrf
        <input hidden type="text" class="form-control" id="id" name="id" value="{{ $cliente->id }}">

        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input required type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $cliente->cnpj }}">
        </div>
        </br>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input required type="text" class="form-control" id="nome" name="nome" value="{{ $cliente->nome }}">
        </div>
        </br>

        <label>Status</a>
        <select name="status">
            <option value="1" @if ($cliente->status == "Ativado") selected="selected" @endif>Ativado</option>
            <option value="0" @if ($cliente->status == "Desativado") selected="selected" @endif>Desativado</option>
        </select>
        </br>

        </br>
        <a href=" {{ route('cliente.index') }} " class="btn btn-outline-primary">Voltar</a>
        <input type="submit" class="btn btn-success" value="Atualizar cliente">
    </form>

@endsection