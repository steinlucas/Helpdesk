<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\UsuarioController;

// Home
Route::get('/', [ChamadoController::class, 'index']);

// Chamados
Route::get('/chamados/create', [ChamadoController::class, 'create']);

Route::get('/chamados/{id}', function($id){
    return view('chamados.chamado', ['id' => $id]);
});

Route::get('/chamados/close/{id}', function($id){
    return view('chamados.close', ['id' => $id]);
});

// Tramites
Route::get('/tramites/create', [TramiteController::class, 'create']);

// Usuarios
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/create', [UsuarioController::class, 'create']);

Route::get('/usuarios/{id}', function($id){
    return view('usuarios.usuario', ['id' => $id]);
});

Route::get('/usuarios/close/{id}', function($id){
    return view('usuarios.close', ['id' => $id]);
});

Route::get('/usuarios/update/{id}', function($id){
    return view('usuarios.update', ['id' => $id]);
});

Route::get('/usuarios/inactivate/{id}', function($id){
    return view('usuarios.inactivate', ['id' => $id]);
});
