<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\ColaboradorController;

Route::get('/', function () {
    return view('welcome');
});

//ROTAS PLANO
Route::resource('/plano', PlanoController::class);

Route::post('/plano/search',
    [PlanoController::class, 'search'])->name('plano.search');

//ROTAS SETOR
Route::resource('/setor', SetorController::class);

Route::post('/setor/search',
    [SetorController::class, 'search'])->name('setor.search');

//ROTAS COLABORADOR
Route::resource('/colaborador', ColaboradorController::class);

Route::post('/colaborador/search',
    [ColaboradorController::class, 'search'])->name('colaborador.search');


