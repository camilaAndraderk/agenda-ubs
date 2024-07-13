<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecepcionistasController extends Controller
{
    public function index(){
            
        $recepcionistas = [
            "Camila",
            "Maria",
            "Yasmim"
        ];

        return view('recepcionistas.index', compact('recepcionistas'));
    }
}
