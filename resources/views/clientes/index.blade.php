@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<h1>Clientes</h1>
</br>

<a href=" {{ route('cliente.create') }} " class="btn btn-primary">Cadastrar um cliente</a>
</br></br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Nome</th>
            <th scope="col">Usuário</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td><a class="nav-link">{{ $cliente->id }}</a></td>
            <td><a class="nav-link">{{ $cliente->cnpj }}</a></td>
            <td><a class="nav-link">{{ $cliente->nome }}</a></td>
            <td><a class="nav-link">{{ $cliente->idusuario }}</a></td>
            <td><a class="nav-link">{{ $cliente->status }}</a></td>
            <td>
                <a href=" {{ route('cliente.show', ['id' => $cliente->id]) }} "><button type="button" class="btn btn-primary">Ver</button></a>
                <a href=" {{ route('cliente.edit', ['id' => $cliente->id]) }} "><button type="button" class="btn btn-outline-primary">Editar</button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection