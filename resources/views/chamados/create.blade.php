@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

    <h1>Abertura de chamado</h1>
    </br>

    <form action="{{ route('chamado.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-2">
                <label>Cliente do chamado</a>
                </br>
                <select name="clienteChamado">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->username }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-2">
                <label>Atendente do chamado</a>
                </br>
                <select name="atendenteChamado">
                    @foreach($atendentes as $atendente)
                        <option value="{{ $atendente->id }}">{{ $atendente->username }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </br>

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do chamado">
        </div>
        </br>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do chamado" rows="5"></textarea>
        </div>
        </br>

        <input type="submit" class="btn btn-primary" value="Abrir chamado"></input>
        <a href="{{ route('chamado.index') }}" class="btn btn-outline-danger">Cancelar</a>
    </form>

@endsection