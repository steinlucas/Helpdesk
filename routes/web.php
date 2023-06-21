<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;

Route::get('/login', [LoginController::class, 'index'])->name('session.index');
Route::post('/login', [LoginController::class, 'login'])->name('session.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('session.logout');

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuario.index');
Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuario.create');
Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuario.store');
Route::get('/usuarios/{id}', [UsuariosController::class, 'show'])->name('usuario.show');
Route::get('/usuarios/edit/{id}', [UsuariosController::class, 'edit'])->name('usuario.edit');
Route::post('/usuarios/update', [UsuariosController::class, 'update'])->name('usuario.update');
Route::get('/usuarios/enable/{id}', [UsuariosController::class, 'enable'])->name('usuario.enable');
Route::get('/usuarios/disable/{id}', [UsuariosController::class, 'disable'])->name('usuario.disable');

Route::get('/clientes', [ClientesController::class, 'index'])->name('cliente.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('cliente.create');
Route::post('/clientes/store', [ClientesController::class, 'store'])->name('cliente.store');
Route::get('/clientes/{id}', [ClientesController::class, 'show'])->name('cliente.show');
Route::get('/clientes/edit/{id}', [ClientesController::class, 'edit'])->name('cliente.edit');
Route::post('/clientes/update', [ClientesController::class, 'update'])->name('cliente.update');

Route::get('/', [ChamadosController::class, 'index'])->name('index');
Route::get('/chamados', [ChamadosController::class, 'index'])->name('chamado.index');
Route::get('/chamados/create', [ChamadosController::class, 'create'])->name('chamado.create');
Route::post('/chamados/create/middleware', [ChamadosController::class, 'createmiddleware'])->name('chamado.createmiddleware');
Route::post('/chamados/store', [ChamadosController::class, 'store'])->name('chamado.store');
Route::get('/chamados/{id}', [ChamadosController::class, 'show'])->name('chamado.show');
Route::get('/chamados/close/{id}', [ChamadosController::class, 'close'])->name('chamado.close');

Route::post('/tramites/create', [TramitesController::class, 'create'])->name('tramite.create');
Route::post('/tramites/store', [TramitesController::class, 'store'])->name('tramite.store');