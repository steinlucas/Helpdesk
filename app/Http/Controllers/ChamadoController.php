<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;

class ChamadoController extends Controller
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

    public function close(){
        return view('chamados.close');
    }
}
