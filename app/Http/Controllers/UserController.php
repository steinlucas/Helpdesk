<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $usuarios = User::all();

        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function store(Request $request){
        $usuario = new User;

        $usuario->nome = $request->nome;
        $usuario->username = $request->username;
        $usuario->password = $request->password;

        $usuario->save();

        return redirect('/usuarios');
    }

    public function update(){
        return view('usuarios.update');
    }

    public function inactivate(){
        // montar a regra pra inativar usuário, e no final jogar pra view lista de usuários.
        return view('usuarios.index');
    }
}