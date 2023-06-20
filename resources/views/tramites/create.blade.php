
@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<?php
    session_start();
?>

<h1>Cadastro de trâmite</h1>

<form action="{{ route('tramite.store') }}" method="POST">
    @csrf
    <input type="text" name="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">

    <div class="form-group">
        <label for="idchamado">Responder para o chamado número <?php echo $_POST['idchamado']; ?>.</label>
        <input hidden type="text" class="form-control" id="idchamado" name="idchamado" value="<?php echo $_POST['idchamado']; ?>">
    </div>
    </br>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea required type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do trâmite" rows="5"></textarea>
    </div>
    </br>

    <a href=" {{ route('chamado.index') }} " class="btn btn-outline-primary">Voltar</a>
    <input type="submit" class="btn btn-primary" value="Gravar"></input>
</form>

@endsection