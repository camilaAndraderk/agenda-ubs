<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecepcionistasController;
use App\Http\Controllers\UbsController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});


// url
// array: classe e método
Route::get('/home',[HomeController::class, 'index']);

Route::controller(RecepcionistasController::class)->group(function(){
    
    // url e método
    Route::get('/recepcionistas',                               'index')   ->name('recepcionistas.index'); // dando um nome para rota
    Route::get('/recepcionistas/cadastrar',                     'create')  ->name('recepcionistas.create');
    Route::post('/recepcionistas/salvar',                       'store')   ->name('recepcionistas.store');
    Route::delete('/recepcionistas/deletar/{recepcionista}',    'destroy') ->name('recepcionistas.destroy');
    Route::get('/recepcionistas/{recepcionista}/editar',        'edit')    ->name('recepcionistas.edit');
    Route::put('/recepcionistas/{recepcionista}',               'update')  ->name('recepcionistas.update');

});

Route::controller(UbsController::class)->group(function(){

    Route::get('/ubs',                               'index')   ->name('ubs.index'); // dando um nome para rota
    Route::get('/ubs/cadastrar',                     'create')  ->name('ubs.create');
    Route::post('/ubs/salvar',                       'store')   ->name('ubs.store');
    Route::delete('/ubs/deletar/{recepcionista}',    'destroy') ->name('ubs.destroy');
    Route::get('/ubs/{recepcionista}/editar',        'edit')    ->name('ubs.edit');
    Route::put('/ubs/{recepcionista}',               'update')  ->name('ubs.update');

});


