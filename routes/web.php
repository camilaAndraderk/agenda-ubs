<?php
// use App\Http\Controllers\LayoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecepcionistasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home',[LayoutController::class, 'index']);

Route::get('/home',[HomeController::class, 'index']);

Route::get('/recepcionistas',[RecepcionistasController::class, 'index']);