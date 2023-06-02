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

Route::get('/', [ChamadoController::class, 'index']);
Route::get('/chamados', [ChamadoController::class, 'index']);
Route::get('/chamados/create', [ChamadoController::class, 'create']);
Route::get('/chamados/details', [ChamadoController::class, 'details']);
//Route::get('/chamados/update', [ChamadoController::class, 'update']); pela regra de negócio, nao eh possivel editar um chamado.
Route::get('/chamados/close', [ChamadoController::class, 'close']);

Route::get('/tramites/create', [TramiteController::class, 'create']);

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/create', [UsuarioController::class, 'create']);
Route::get('/usuarios/details', [UsuarioController::class, 'details']);
Route::get('/usuarios/update', [UsuarioController::class, 'update']);
//Route::get('/chamados/delete', [ChamadoController::class, 'delete']); Nao posso excluir um usuário por causa da restricao de integridade do banco, pq o chamado tem um usuarop
Route::get('/usuarios/inactivate', [UsuarioController::class, 'inactivate']);
