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

    public function details(){
        return view('chamados.details');
    }

    //public function update(){
    //    return view('chamados.update');
    //} nao pode editar chamado

    public function close(){
        return view('chamados.close');
    }
}
