<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use Illuminate\Routing\RouteGroup;

/*
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/clientes/create',[ClienteController::class,'create']); */

/* Para crear rutas y acceder de forma automatizada a los métodos */

Route::resource('clientes', ClienteController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=> false]);

Route::get('/home', [ClienteController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', [ClienteController::class, 'index'])->name('home');
});