<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\Usuario;

class ChamadosController extends Controller
{
    public function index(){
        $chamados = Chamado::all();

        return view('chamados.index', ['chamados' => $chamados]);
    }

    public function store(Request $request){
        $chamado = new Chamado;

        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;

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
        $chamado = Chamado::find($id);
        $usuarioAbriu = Usuario::find($chamado->usuarioAbriu);
        $atendenteResponsavel = Usuario::find($chamado->atendenteResponsavel);

        $chamado->usuarioAbriu = $usuarioAbriu->nome;
        $chamado->atendenteResponsavel = $atendenteResponsavel->nome;

        return view('chamados.show', compact('chamado'));
    }

    public function create() {
        $atendentes = Usuario::where('tipoUsuario', 1)->get();
        $clientes = Usuario::where('tipoUsuario', 2)->get();

        return view('chamados.create', compact(['atendentes', 'clientes']));
    }

    //public function delete($id){
    //    $chamado = Chamado::find($id);
    //    $chamado->delete();
    //
    //    return redirect('/');
    //}
}
