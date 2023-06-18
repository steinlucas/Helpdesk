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
use App\Http\Controllers\ClientesController;

Route::controller(ChamadosController::class)->group(function () {
    Route::get('/', [ChamadosController::class, 'index'])->name('index');
    Route::get('/chamados', [ChamadosController::class, 'index'])->name('chamado.index');
    Route::get('/chamados/create', [ChamadosController::class, 'create'])->name('chamado.create');
    Route::post('/chamados/store', [ChamadosController::class, 'store'])->name('chamado.store');
    Route::get('/chamados/{id}', [ChamadosController::class, 'show'])->name('chamado.show');
    Route::get('/chamados/close/{id}', [ChamadosController::class, 'close'])->name('chamado.close');
    Route::get('/tramites', [ChamadosController::class, 'index'])->name('chamado.index');
});

Route::controller(TramitesController::class)->group(function () {
    Route::post('/tramites/create', [TramitesController::class, 'create'])->name('tramite.create');
    Route::post('/tramites/store', [TramitesController::class, 'store'])->name('tramite.store');
});

Route::controller(ClientesController::class)->group(function () {
    Route::get('/clientes', [ClientesController::class, 'index'])->name('cliente.index');
    Route::get('/clientes/create', [ClientesController::class, 'create'])->name('cliente.create');
    Route::post('/clientes/store', [ClientesController::class, 'store'])->name('cliente.store');
    Route::get('/clientes/{id}', [ClientesController::class, 'show'])->name('cliente.show');
    Route::get('/clientes/edit/{id}', [ClientesController::class, 'edit'])->name('cliente.edit');
    Route::post('/clientes/update', [ClientesController::class, 'update'])->name('cliente.update');
});

Route::controller(TramitesController::class)->group(function () {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuario.index');
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuario.create');
    Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuario.store');
    Route::get('/usuarios/{id}', [UsuariosController::class, 'show'])->name('usuario.show');
    Route::get('/usuarios/edit/{id}', [UsuariosController::class, 'edit'])->name('usuario.edit');
    Route::post('/usuarios/update', [UsuariosController::class, 'update'])->name('usuario.update');
    Route::get('/usuarios/enable/{id}', [UsuariosController::class, 'enable'])->name('usuario.enable');
    Route::get('/usuarios/disable/{id}', [UsuariosController::class, 'disable'])->name('usuario.disable');
});
