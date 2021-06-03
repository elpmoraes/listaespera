<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaJogoController;
use App\Http\Controllers\UserController;
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

Route::get('/meusdados', function () {
                 if (! Gate::allows('ativo')) {
            abort(403, 'Seu usuário está desativado. Contate a administração.');
        }
    return view('user/meusdados');
})->middleware(['auth'])->name('meusdados');

Route::get('/exibirLista/{id}', [ListaJogoController::class, 'exibirLista'], function () {
    return view('user.exibirLista');
})->middleware(['auth'])->name('exibirLista');


Route::get('/dashboard', function () {
                 if (! Gate::allows('ativo')) {
            abort(403, 'Seu usuário está desativado. Contate a administração.');
        }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//ADMIN
Route::get('/admin/dashboard', function () {
                 if (! Gate::allows('admin')) {
            abort(403);
        }
    return view('admin/dashboard');
})->middleware(['auth'])->name('admindashboard');


Route::resource('listajogos', ListaJogoController::class);

Route::resource('usuario', UserController::class);

Route::get('/inscricao/codlista', [ListaJogoController::class, 'showCodLista'])->name('inscricao.codlista');
Route::post('/inscricao/{idLista}/{idUser}', [ListaJogoController::class, 'inscrever'])->name('inscrever');
Route::get('/removerinscricao/{idLista}/{idUser}', [ListaJogoController::class, 'removerInscricao'])->name('removerInscricao');
Route::get('/listajogos/cancelar/{idLista}', [ListaJogoController::class, 'cancelarJogo'])->name('cancelarJogo');

Route::post('/gerarSenha/{id}', [UserController::class, 'gerarSenha'])->name('gerarSenha');
Route::get('/usuario/alterarstatus/{idUser}', [UserController::class, 'ativarDesativar'])->name('ativarDesativar');


require __DIR__.'/auth.php';
