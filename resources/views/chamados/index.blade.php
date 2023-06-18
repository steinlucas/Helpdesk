@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    <h1>Chamados</h1>
    </br>
    
    <a href="{{ route('chamado.create') }}" class="btn btn-primary">Cadastrar um chamado</a>
    </br></br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col">Quem abriu</th>
                <th scope="col">Atendente</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chamados as $chamado)
            <tr>
                <td><a href="{{ route('chamado.show', ['id' => $chamado->id]) }} " class="nav-link">{{ $chamado->id }}</a></td>
                <td class="ellipsis"><a class="nav-link">{{ $chamado->titulo }}</a></td>
                <td class="ellipsis"><a class="nav-link">{{ $chamado->descricao }}</a></td>
                <td><a class="nav-link">{{ $chamado->status }}</a></td>
                <td><a class="nav-link">{{ $chamado->usuarioAbriu }}</a></td>
                <td><a class="nav-link">{{ $chamado->atendenteResponsavel }}</a></td>
                <td>
                    <a href="/tramites/edit/{{ $chamado->id }}"><button type="button" class="btn btn-primary">Responder</button></a>
                    <a href=" {{ route('chamado.show', ['id' => $chamado->id]) }} "><button type="button" class="btn btn-outline-primary">Ver</button></a>
                    @if ($chamado->status == "Aberto")
                        <a href=" {{ route('chamado.close', ['id' => $chamado->id]) }} "><button type="button" class="btn btn-outline-primary">Encerrar</button></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection