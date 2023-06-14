<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TramitesController extends Controller
{
    public function create(){
        return view('tramites.create');
    }
}
