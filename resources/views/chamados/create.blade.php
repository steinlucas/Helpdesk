@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Cliente: <?php echo $_SESSION['nomecliente']; ?></p>
<p>Usuário: <?php echo $_SESSION['username']; ?> - Nome: <?php echo $_SESSION['nome']; ?></p>

<h1>Cadastro de chamado</h1>
</br>

<form action="{{ route('chamado.store') }}" method="POST">
    @csrf
    <div class="row">
        <input hidden type="text" name="idusuario" value="{{ $idusuario }}">

        <div class="col-md-2">
            <label>Cliente do chamado</a>
            </br>
            <select required name="cliente">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <label>Atendente do chamado</a>
            </br>
            <select required name="atendente">
                @foreach($atendentes as $atendente)
                    @if ($atendente->id != 1)
                        <option value="{{ $atendente->id }}">{{ $atendente->username }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    </br>

    <div class="form-group">
        <label for="titulo">Título</label>
        <input required type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do chamado">
    </div>
    </br>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea required type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do chamado" rows="5"></textarea>
    </div>
    </br>

    <a href=" {{ route('chamado.index') }} " class="btn btn-outline-primary">Voltar</a>
    <input type="submit" class="btn btn-primary" value="Gravar"></input>
</form>

@endsection