<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramite;

class TramitesController extends Controller
{
    public function create(){
        return view('tramites.create');
    }

    public function store(Request $request){
        $tramite = new Tramite;

        $tramitesExistentes = Tramite::where('idchamado', $request->idchamado)->get();
        $novoseqtramite = count($tramitesExistentes) + 1;

        $tramite->seqtramite = $novoseqtramite;
        $tramite->idusuario = 1; //lucas.stein
        $tramite->idchamado = $request->idchamado;
        $tramite->descricao = $request->descricao;

        $tramite->save();

        return redirect()->to(route('chamado.index'));
    }

    public function show($idchamado) {
        return Tramite::where('idchamado', $idchamado)->orderBy('created_at', 'DESC')->get();
    }

}
