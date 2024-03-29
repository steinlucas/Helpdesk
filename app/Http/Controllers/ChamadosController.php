<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\Cliente;
use App\Models\Usuario;

class ChamadosController extends Controller {
    
    public function index() {
        $chamados = Chamado::all();
        
        foreach($chamados as $chamado) {
            $usuariosAbriram = Usuario::find($chamado->usuarioAbriu)->first()->get();
            $usuariosAtendentes = Usuario::find($chamado->idatendente)->first()->get();

            foreach($usuariosAbriram as $usuario) {
                if ($chamado->usuarioAbriu == $usuario->id) {
                    $chamado->usuarioAbriu = $usuario->nome;

                    foreach($usuariosAtendentes as $usuarioAtendente) {
                        if ($chamado->idatendente == $usuarioAtendente->id) {
                            $chamado->idatendente = $usuarioAtendente->username;
                        }
                    }

                    if ($chamado->status == true) {
                        $chamado->status = "Aberto";
                    } else {
                        $chamado->status = "Fechado";
                    }
                }
            }
        }
        
        return view('chamados.index', ['chamados' => $chamados]);
    }

    public function store(Request $request) {
        $chamado = new Chamado;

        $chamado->usuarioAbriu = $request->idusuario;
        $chamado->idcliente = $request->cliente;
        $chamado->idatendente = $request->atendente;
        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->status = 1;
        $chamado->save();

        return redirect()->to(route('chamado.index'));
    }

    public function close($id) {
        $chamado = Chamado::find($id);
        $chamado->status = false;
        $chamado->save();

        return redirect()->to(route('chamado.index'));
    }

    public function reopen($id) {
        $chamado = Chamado::find($id);
        $chamado->status = true;
        $chamado->save();

        return redirect()->to(route('chamado.index'));
    }

    public function show($id) {
        $chamado = Chamado::find($id);
        $cliente = Cliente::find($chamado->idcliente);

        $usuariosAbriram = Usuario::find($chamado->usuarioAbriu)->first()->get();
        $usuariosAtendentes = Usuario::find($chamado->idatendente)->first()->get();

        foreach($usuariosAbriram as $usuario) {
            if ($chamado->usuarioAbriu == $usuario->id) {
                $chamado->usuarioAbriu = $usuario->nome;

                foreach($usuariosAtendentes as $usuarioAtendente) {
                    if ($chamado->idatendente == $usuarioAtendente->id) {
                        $chamado->idatendente = $usuarioAtendente->nome;
                    }
                }

                if ($chamado->status == true) {
                    $chamado->status = "Aberto";
                } else {
                    $chamado->status = "Fechado";
                }
            }
        }

        $chamado->idcliente = $cliente->nome;

        $tramites = app('App\Http\Controllers\TramitesController')->show($chamado->id);
        
        foreach ($tramites as $tramite) {
            $usuariosTramitaram = Usuario::find($tramite->idusuario)->first()->get();

            foreach ($usuariosTramitaram as $usuarioTramite) {
                if ($usuarioTramite->id == $tramite->idusuario) {
                    $tramite->idusuario = $usuarioTramite->username;
                }
            }
        }

        return view('chamados.show', compact(['chamado', 'tramites']));
    }

    public function createmiddleware(Request $request) {
        return $this->create($request);
    }

    public function create(Request $request) {
        $atendentes = Usuario::where('idtipousuario', 2)->get();
        $clientes = Cliente::where('status', 1)->where('id', '!=', 1)->get();
        $idusuario = $request->idusuario;

        if ($request->idtipousuario == 1 || $request->idtipousuario == 2) {
            $clientes = Cliente::where('status', 1)->where('id', '!=', 1)->get();
        } else {
            $clientes = Cliente::where('status', 1)->where('id', '!=', 1)->where('id', $request->idcliente)->get();
        }

        return view('chamados.create', compact(['atendentes', 'clientes', 'idusuario']));
    }
}