<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\Usuario;

class ChamadosController extends Controller
{
    public function index(){
        $chamados = Chamado::all();
        
        foreach($chamados as $chamado) {
            $usuariosAbriram = Usuario::find($chamado->usuarioAbriu)->first()->get();
            $usuariosAtendentes = Usuario::find($chamado->atendenteResponsavel)->first()->get();

            foreach($usuariosAbriram as $usuario) {
                if ($chamado->usuarioAbriu == $usuario->id) {
                    $chamado->usuarioAbriu = $usuario->nome;

                    foreach($usuariosAtendentes as $usuarioAtendente){
                        if ($chamado->atendenteResponsavel == $usuarioAtendente->id) {
                            $chamado->atendenteResponsavel = $usuarioAtendente->nome;
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

    public function store(Request $request){
        $chamado = new Chamado;

        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->cliente = 1; // lucas.stein
        $chamado->atendenteResponsavel = $request->atendente;
        $chamado->usuarioAbriu = $request->cliente;
        $chamado->save();

        return redirect('/');
    }

    public function close($id) {
        $chamado = Chamado::find($id);
        $chamado->status = false;
        $chamado->save();

        return redirect('/');
    }

    public function reopen($id) {
        $chamado = Chamado::find($id);
        $chamado->status = true;
        $chamado->save();

        return redirect('/');
    }

    public function show($id) {
        $chamados = Chamado::where('id', $id)->get();
        
        foreach($chamados as $chamado) {
                $usuariosAbriram = Usuario::find($chamado->usuarioAbriu)->first()->get();
                $usuariosAtendentes = Usuario::find($chamado->atendenteResponsavel)->first()->get();
    
                foreach($usuariosAbriram as $usuario) {
                    if ($chamado->usuarioAbriu == $usuario->id) {
                        $chamado->usuarioAbriu = $usuario->nome;
    
                        foreach($usuariosAtendentes as $usuarioAtendente){
                            if ($chamado->atendenteResponsavel == $usuarioAtendente->id) {
                                $chamado->atendenteResponsavel = $usuarioAtendente->nome;
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

        return view('chamados.show', compact('chamado'));
    }

    public function create() {
        $atendentes = Usuario::where('tipoUsuario', 1)->get();
        $clientes = Usuario::where('tipoUsuario', 2)->get();

        return view('chamados.create', compact(['atendentes', 'clientes']));
    }
}
