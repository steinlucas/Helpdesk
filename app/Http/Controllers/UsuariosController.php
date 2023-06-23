<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TiposUsuario;
use App\Models\Cliente;

class UsuariosController extends Controller {

    public function index() {
        $usuarios = Usuario::all();
        $tiposUsuario = TiposUsuario::all();
        $clientes = Cliente::all();

        foreach ($usuarios as $usuario) {
            foreach ($clientes as $cliente) {
                if ($usuario->idcliente == $cliente->id) {
                    $usuario->idcliente = $cliente->nome;
                }
            }

            foreach ($clientes as $cliente) {
                foreach ($tiposUsuario as $tipoUsuario) {
                    if ($usuario->idtipousuario == $tipoUsuario->id) {
                        $usuario->idtipousuario = $tipoUsuario->descricao;
                    }
                }
            }
        }

        return view('usuarios.index', compact('usuarios'));
    }

    public function create() {
        $tiposUsuarios = TiposUsuario::all();

        return view('usuarios.create', compact('tiposUsuarios'));
    }

    public function store(Request $request) {
        $usuario = new Usuario;
        $tipoUsuario = TiposUsuario::find($request->tipoUsuario);

        $usuario->nome = $request->nome;
        $usuario->username = $request->username;
        $usuario->password = $request->password;
        $usuario->status = $request->status;
        $usuario->idtipousuario = $tipoUsuario->id;
        $usuario->save();

        return redirect()->to(route('usuario.index'));
    }

    public function show($id) {
        $usuarioInner = Usuario::where('id', $id)->get();
        $tiposUsuario = TiposUsuario::all();
        $clientes = Cliente::all();

        foreach ($usuarioInner as $usuario) {
            foreach ($clientes as $cliente) {
                if ($usuario->idcliente == $cliente->id) {
                    $usuario->idcliente = $cliente->nome;
                }
            }

            foreach ($tiposUsuario as $tipoUsuario) {
                if ($usuario->tipoUsuario == $tipoUsuario->id) {
                    $usuario->tipoUsuario = $tipoUsuario->descricao;

                    if ($usuario->status == true) {
                        $usuario->status = "Ativado";
                    } else {
                        $usuario->status = "Desativado";
                    }
                }
            }
        }
        
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id) {
        $usuario = Usuario::find($id);

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request) {
        $usuario = Usuario::find($request->id);
        $usuario->nome = $request->nome;
        $usuario->username = $request->username;
        $usuario->status = $request->status;

        if ($request->password != $usuario->password) {
            $usuario->password = $request->password;
        }

        $usuario->save();

        return redirect()->to(route('usuario.index'));
    }

    public function enable($id) {
        $usuario = Usuario::find($id);
        $usuario->status = 1;
        $usuario->save();
        
        return redirect()->to(route('usuario.index'));
    }

    public function disable($id) {
        $usuario = Usuario::find($id);
        $usuario->status = 0;
        $usuario->save();

        return redirect()->to(route('usuario.index'));
    }
}