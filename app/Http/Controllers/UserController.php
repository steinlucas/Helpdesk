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

        return redirect('/usuarios/index');
    }

    public function getUsuario($id) {
        $usuario = User::find($id);

        return view('usuarios.usuario', ['usuario' => $usuario]);
    }

    public function update($id){
        $usuarios = User::find($id);

        foreach($usuarios as $usuario){
            if ($usuario->$id == $id){
                return view('usuarios.index');
            } else {
                //
                //eturn view('usuarios/index', ['usuario' => $usuario]);
            }
        }

        return view('usuarios.index', ['usuarios' => $usuarios]);

        //return view('usuarios/$id');
    }

    public function inactivate($id) {
        $usuario = User::find($id);
        $usuario->status = false;
        $usuario->save();

        return redirect('usuarios/index');
    }

    public function activate($id) {
        $usuario = User::find($id);
        $usuario->status = true;
        $usuario->save();

        return redirect('usuarios/index');
    }
}
