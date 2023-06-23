@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<p>Cliente: <?php echo $_SESSION['nomecliente']; ?></p>
<p>Usuário: <?php echo $_SESSION['username']; ?> - Nome: <?php echo $_SESSION['nome']; ?></p>

<h1>Chamados</h1>
</br>
    <form action="{{ route('chamado.createmiddleware') }}" method="POST">
        @csrf
        <input hidden type="text" name="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
        <input hidden type="text" name="idcliente" value="<?php echo $_SESSION['idcliente']; ?>">
        <input hidden type="text" name="idtipousuario" value="<?php echo $_SESSION['idtipousuario']; ?>">
        <button type="submit" class="btn btn-primary">Cadastrar um chamado</button>
    </form>
</br></br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Título</th>
            <th scope="col">Status</th>
            <th scope="col">Quem abriu</th>
            <th scope="col">Atendente</th>
            <th scope="col">Aberto em</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($chamados as $chamado)
            @if ($_SESSION['idcliente'] == $chamado->cliente || $_SESSION['nome'] == $chamado->atendenteResponsavel || $_SESSION['username'] == "admin")
                <tr>
                    <td><a href="{{ route('chamado.show', ['id' => $chamado->id]) }} " class="nav-link">{{ $chamado->id }}</a></td>
                    <td class="collapse-td"><a class="nav-link">{{ $chamado->titulo }}</a></td>
                    <td><a class="nav-link">{{ $chamado->status }}</a></td>
                    <td><a class="nav-link">{{ $chamado->usuarioAbriu }}</a></td>
                    <td><a class="nav-link">{{ $chamado->atendenteResponsavel }}</a></td>
                    <td><a class="nav-link">{{ $chamado->created_at->format("d/m/Y") }}</a></td>
                    <td>
                        <a href=" {{ route('chamado.show', ['id' => $chamado->id]) }} "><button type="button" class="btn btn-outline-primary">Ver</button></a>
                        @if ($chamado->status == "Aberto")
                            <form class="form-td" action="{{ route('tramite.create') }}" method="POST">
                                @csrf
                                <input hidden type="text" name="idchamado" value="{{ $chamado->id }}">
                                <button type="submit" class="btn btn-primary">Responder</button>
                            </form>
                            <a href=" {{ route('chamado.close', ['id' => $chamado->id]) }} "><button type="button" class="btn btn-outline-primary">Encerrar</button></a>
                        @endif
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

@endsection