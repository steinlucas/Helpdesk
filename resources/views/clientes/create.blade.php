@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<h1>Cadastro de cliente</h1>
</br>

<form action="{{ route('cliente.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input required type="number" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ do cliente">
    </div>
    </br>

    <div class="form-group">
        <label for="nome">Nome do cliente</label>
        <input required type="text" class="form-control" id="nome" name="nome" placeholder="Nome do cliente">
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

    <select hidden name="tipoUsuario">
            <option value="2">Cliente</option>
    </select>

    </br>
    <a href=" {{ route('chamado.index') }} " class="btn btn-outline-primary">Voltar</a>
    <input type="submit" class="btn btn-primary" value="Gravar"></input>
</form>

@endsection