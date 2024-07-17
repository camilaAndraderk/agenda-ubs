<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\UbsController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});


// url
// array: classe e método
Route::get('/home',[HomeController::class, 'index']);

Route::controller(RecepcionistaController::class)->group(function(){
    
    // url e método
    Route::get('/recepcionista',                              'index')   ->name('recepcionista.index'); // dando um nome para rota
    Route::get('/recepcionista/cadastrar',                    'create')  ->name('recepcionista.create');
    Route::post('/recepcionista/salvar',                      'store')   ->name('recepcionista.store');
    // Route::delete('/recepcionista/deletar/{recepcionista}',   'destroy') ->name('recepcionista.destroy');
    Route::get('/recepcionista/{recepcionista}/editar',       'edit')    ->name('recepcionista.edit');
    Route::put('/recepcionista/{recepcionista}',              'update')  ->name('recepcionista.update');
    Route::get('/recepcionista/{recepcionista}',              'show')    ->name('recepcionista.show');

});

Route::controller(UbsController::class)->group(function(){

    Route::get('/ubs',                    'index')   ->name('ubs.index'); 
    Route::get('/ubs/cadastrar',          'create')  ->name('ubs.create');
    Route::post('/ubs/salvar',            'store')   ->name('ubs.store');
    Route::delete('/ubs/deletar/{ubs}',   'destroy') ->name('ubs.destroy');
    Route::get('/ubs/{ubs}/editar',       'edit')    ->name('ubs.edit');
    Route::put('/ubs/{ubs}',              'update')  ->name('ubs.update');
    Route::get('/ubs/{ubs}',              'show')    ->name('ubs.show');
});


Route::controller(MedicoController::class)->group(function(){

    Route::get('/medico',                       'index')   ->name('medico.index');
    Route::get('/medico/cadastrar',             'create')  ->name('medico.create');
    Route::post('/medico/salvar',               'store')   ->name('medico.store');
    // Route::delete('/medico/deletar/{medico}',   'destroy') ->name('medico.destroy');
    Route::get('/medico/{medico}/editar',       'edit')    ->name('medico.edit');
    Route::put('/medico/{medico}',              'update')  ->name('medico.update');
    Route::get('/medico/{medico}',              'show')    ->name('medico.show');
});


Route::controller(PacienteController::class)->group(function(){

    Route::get('/paciente',                       'index')   ->name('paciente.index');
    Route::get('/paciente/cadastrar',             'create')  ->name('paciente.create');
    Route::post('/paciente/salvar',               'store')   ->name('paciente.store');
    // Route::delete('/paciente/deletar/{paciente}',   'destroy') ->name('paciente.destroy');
    Route::get('/paciente/{paciente}/editar',       'edit')    ->name('paciente.edit');
    Route::put('/paciente/{paciente}',              'update')  ->name('paciente.update');
    Route::get('/paciente/{paciente}',              'show')    ->name('paciente.show');
});
