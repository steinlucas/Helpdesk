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

    public function create(){
        return view('chamados.create');
    }

    public function close(){
        return view('chamados.close');
    }
}
