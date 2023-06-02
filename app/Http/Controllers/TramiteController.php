<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function create(){
        return view('tramites.create');
    }
}
