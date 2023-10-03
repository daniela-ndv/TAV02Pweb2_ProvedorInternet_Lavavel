<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;

Route::get('/', function () {
    return view('welcome');
});

//ROTAS PLANO
Route::resource('/plano', PlanoController::class);

Route::post('/plano/search',
    [PlanoController::class, 'search'])->name('plano.search');

