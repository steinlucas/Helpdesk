<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    public function index(){
        return view('chamados.index');
    }

    public function create(){
        return view('chamados.create');
    }

    public function close(){
        return view('chamados.close');
    }
}
