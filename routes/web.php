<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});
      
Route::get('/usuarios', [\App\Http\Controllers\UsuariosController::class,'lista'])->name('usuarios');

Route::get('/devs', [\App\Http\Controllers\DevsController::class,'index'])->name('devs');

Route::get('/novo-usuario', [\App\Http\Controllers\UsuariosController::class,'novo'])->name('novo-usuario');

Route::post('/store', [\App\Http\Controllers\UsuariosController::class,'store'])->name('store');
    
Route::get('/usuario-detalhes/{id}', [\App\Http\Controllers\UsuariosController::class,'usuario_detalhes'])->name('usuario-detalhes');

