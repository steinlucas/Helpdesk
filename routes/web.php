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

use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\UsuariosController;

// Home
Route::get('/', [ChamadosController::class, 'index'])->name('index');

// Chamados
Route::get('/chamados', [ChamadosController::class, 'index'])->name('chamado.index');
Route::get('/chamados/create', [ChamadosController::class, 'create'])->name('chamado.create');
Route::post('/chamados/store', [ChamadosController::class, 'store'])->name('chamado.store');
Route::get('/chamados/{id}', [ChamadosController::class, 'show'])->name('chamado.show');

// Tramites
Route::get('/tramites/create/{idchamado}', [TramitesController::class, 'create'])->name('tramite.create');

// Usuarios
Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuario.index');
Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuario.create');
Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuario.store');
Route::get('/usuarios/{id}', [UsuariosController::class, 'show'])->name('usuario.show');
Route::get('/usuarios/edit/{id}', [UsuariosController::class, 'edit'])->name('usuario.edit');
Route::post('/usuarios/update', [UsuariosController::class, 'update'])->name('usuario.update');