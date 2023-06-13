@extends('layouts.main')

@section('title', 'Helpdesk')

@section('content')

<div id="usuario-details-container" class="container">

    <h1>Detalhes do usuário</h1>

    </br>
    @foreach($usuarios as $usuario)
        <tr>
            <td><a href="/usuarios/{{ $usuario->id }}" class="nav-link">{{ $usuario->nome }}</a></td>
            <td><a href="/usuarios/{{ $usuario->id }}" class="nav-link">{{ $usuario->username }}</a></td>
            <td><a href="/usuarios/{{ $usuario->id }}" class="nav-link">{{ $usuario->password }}</a></td>
            <td>
            @if ($usuario->status == true)
                <a href="/usuarios/inactivate/{{$usuario->id}}"><i class="material-icons">lock</i></a>
            @else
                <a href="/usuarios/activate/{{$usuario->id}}"><i class="material-icons">lock_open</i></a>
            @endif
            <a href="//usuarios/update/{{$usuario->id}}"><i class="material-icons">edit</i></a>
            </td>
        </tr>
        @endforeach
    
    <a href="/">Voltar à página inicial</a>
    
@endsection