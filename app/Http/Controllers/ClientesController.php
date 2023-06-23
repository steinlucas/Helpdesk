<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Usuario;

class ClientesController extends Controller {
    
    public function index() {
        $clientes = Cliente::all();
        $usuarios = Usuario::all();

        foreach ($clientes as $cliente) {
            foreach ($usuarios as $usuario) {
                if ($usuario->idcliente == $cliente->id) {
                    $cliente->idusuario = $usuario->username;
                }
            }
        }
        
        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function store(Request $request) {
        $cliente = new Cliente;
        $cliente->cnpj = $request->cnpj;
        $cliente->nome = $request->nome;
        $cliente->status = $request->status;

        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->username = $request->username;
        $usuario->password = $request->password;
        $usuario->status = $request->status;
        $usuario->idtipousuario = $request->tipoUsuario;

        $cliente->save();
        $usuario->save();

        $cliente->idusuario = $usuario->id;
        $usuario->idcliente = $cliente->id;

        $cliente->save();
        $usuario->save();

        return redirect()->to(route('cliente.index'));
    }

    public function edit($id) {
        $cliente = Cliente::find($id);
        $usuarios = Usuario::where('idcliente', $cliente->id)->get();

        foreach ($usuarios as $usuario) {
            if ($usuario->idcliente == $cliente->id) {
                $cliente->idusuario = $usuario->username;
            }
        }

        return view('clientes.edit', compact('cliente'));
    }

    public function show($id) {
        $clienteInner = Cliente::where('id', $id)->get();
        
        foreach($clienteInner as $cliente) {
            $usuarios = Usuario::where('idcliente', $cliente->idusuario)->get();

            foreach($usuarios as $usuario) {
                if ($usuario->idcliente == $cliente->id) {
                    $cliente->idusuario = $usuario->username;

                    if ($cliente->status == true) {
                        $cliente->status = "Ativado";
                    } else {
                        $cliente->status = "Desativado";
                    }
                }
            }
        }

        return view('clientes.show', compact('cliente'));
    }

    public function create() {
        return view('clientes.create');
    }

    public function update(Request $request) {
        $cliente = Cliente::find($request->id);
        $cliente->cnpj = $request->cnpj;
        $cliente->nome = $request->nome;

        if ($request->status == 1) {
            $request->status = true;
        } else {
            $request->status = false;
        }

        $cliente->status = $request->status;
        $cliente->save();

        return redirect()->to(route('cliente.index'));
    }

    public function enable($id) {
        $cliente = Cliente::find($id);
        $cliente->status = 1;
        $cliente->save();
        
        return redirect()->to(route('cliente.index'));
    }

    public function disable($id) {
        $cliente = Cliente::find($id);
        $cliente->status = 0;
        $cliente->save();

        return redirect()->to(route('cliente.index'));
    }
}