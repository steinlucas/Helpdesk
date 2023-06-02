<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        return view('usuarios.index');
    }

    public function create(){
        return view('usuarios.create');
    }

    public function details(){
        return view('usuarios.details');
    }

    public function update(){
        return view('usuarios.update');
    }

    public function inactivate(){
        // montar a regra pra inativar usuário, e no final jogar pra lista de usuários
        return view('usuarios.index');
    }
}
