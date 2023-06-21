<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramite;
use App\Models\Usuario;

class TramitesController extends Controller
{
    public function create(){
        return view('tramites.create');
    }

    public function store(Request $request){
        $tramite = new Tramite;

        $tramitesExistentes = Tramite::where('idchamado', $request->idchamado)->get();

        $novoseqtramite = count($tramitesExistentes);

        if ($novoseqtramite == 0) {
            $novoseqtramite = 1;
        } else {
            $novoseqtramite = $novoseqtramite + 1; 
        }
        
        $tramite->seqtramite = $novoseqtramite;
        $tramite->idusuario = $request->idusuario;
        $tramite->idchamado = $request->idchamado;
        $tramite->descricao = $request->descricao;

        $tramite->save();

        return redirect()->to(route('chamado.show', $tramite->idchamado));
    }

    public function show($idchamado) {
        return Tramite::where('idchamado', $idchamado)->orderBy('created_at', 'DESC')->get();
    }
}