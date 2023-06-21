<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\UserType;
use App\Models\Cliente;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $tiposUsuario = UserType::all();
        $clientes = Cliente::all();

        foreach ($usuarios as $usuario) {
            foreach ($clientes as $cliente) {
                if ($usuario->idcliente == $cliente->id) {
                    $usuario->idcliente = $cliente->nome;
                }
            }

            foreach ($clientes as $cliente) {
                foreach ($tiposUsuario as $tipoUsuario) {
                    if ($usuario->tipoUsuario == $tipoUsuario->id){
                        $usuario->tipoUsuario = $tipoUsuario->description;
                    }
                }
            }
        }

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposUsuarios = UserType::all();

        return view('usuarios.create', compact('tiposUsuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $tipoUsuario = UserType::find($request->tipoUsuario);

        $usuario->nome = $request->nome;
        $usuario->username = $request->username;
        $usuario->password = $request->password;

        if ($request->status == 0){
            $usuario->status = false;
        } else {
            $usuario->status = true;
        }

        $usuario->tipoUsuario = $tipoUsuario->id;
        $usuario->save();

        return redirect()->to(route('usuario.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuarioInner = Usuario::where('id', $id)->get();
        $tiposUsuario = UserType::all();
        $clientes = Cliente::all();

        foreach ($usuarioInner as $usuario) {
            foreach ($clientes as $cliente) {
                if ($usuario->idcliente == $cliente->id) {
                    $usuario->idcliente = $cliente->nome;
                }
            }

            foreach ($tiposUsuario as $tipoUsuario) {
                if ($usuario->tipoUsuario == $tipoUsuario->id){
                    $usuario->tipoUsuario = $tipoUsuario->description;

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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $tiposUsuario = UserType::all();

        return view('usuarios.edit', compact(['usuario', 'tiposUsuario']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $usuario = Usuario::find($request->id);
        $tipoUsuario = UserType::find($request->tipoUsuario);

        $usuario->nome = $request->nome;
        $usuario->username = $request->username;

        if ($request->password != $usuario->password){
            $usuario->password = $request->password;
        }

        if ($request->status == true){
            $usuario->status = 1;
        } else {
            $usuario->status = 0;
        }

        $usuario->tipoUsuario = $tipoUsuario->id;
        $usuario->save();

        return redirect()->to(route('usuario.index'));
    }

    public function enable(string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->status = 1;

        $usuario->save();
        return redirect()->to(route('usuario.index'));
    }

    public function disable(string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->status = 0;

        $usuario->save();
        return redirect()->to(route('usuario.index'));
    }
}