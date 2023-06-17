<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Usuario;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        $usuarios = Usuario::all();

        foreach ($clientes as $cliente) {
            foreach ($usuarios as $usuario) {
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
        
        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function store(Request $request){
        $cliente = new Cliente;
        $cliente->cnpj = $request->cnpj;
        $cliente->nome = $request->nome;
        $cliente->status = true;

        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->username = $request->username;
        $usuario->password = $request->password;
        
        $cliente->save();
        $usuario->save();

        $cliente->idusuario = $usuario->id;
        $usuario->idcliente = $cliente->id;

        $cliente->save();
        $usuario->save();

        return redirect()->to(route('cliente.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $usuarios = Usuario::where('idcliente', $cliente->id)->get();

        foreach ($usuarios as $usuario) {
            if ($usuario->idcliente == $cliente->id) {
                $cliente->idusuario = $usuario->username;
    
                if ($cliente->status == true) {
                    $cliente->status = "Ativado";
                } else {
                    $cliente->status = "Desativado";
                }
            }
        }

        return view('clientes.edit', compact('cliente'));
    }

    public function show($id) {
        $cliente = Cliente::where('id', $id)->get();

        foreach($cliente as $clienteInner) {
            $usuarios = Usuario::find($clienteInner->idusuario)->first()->get();

            foreach($usuarios as $usuario) {
                if ($usuario->idcliente == $clienteInner->id) {
                    $clienteInner->idusuario = $usuario->username;

                    if ($clienteInner->status == true) {
                        $clienteInner->status = "Ativado";
                    } else {
                        $clienteInner->status = "Desativado";
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
        $cliente->status = $request->status;
        $cliente->save();

        return redirect()->to(route('cliente.index'));
    }
}
