<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PessoaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente', function () {
    return view('cliente_index');
});

Route::get('/cliente/criar', function () {
    return view('cliente_criar');
});
Route::get('/cliente/editar/{id}', function () {
    return view('cliente_editar');
});

Route::namespace('Admin')->group(function(){
    Route::get('/clientes/listar', [PessoaController::class, 'listar']);
    Route::post('/clientes/cadastrar', [PessoaController::class, 'cadastrar']);
    Route::post('/clientes/salvar', [PessoaController::class, 'salvar']);
    Route::get('/clientes/carregar/{id}', [PessoaController::class, 'carregar']);
    Route::delete('/clientes/excluir/{id}', [PessoaController::class, 'excluir']);
    
});
