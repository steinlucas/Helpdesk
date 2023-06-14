<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;

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

    //public function delete($id){
    //    $chamado = Chamado::find($id);
    //    $chamado->delete();
    //
    //    return redirect('/');
    //}
}
