<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecepcionistasController extends Controller
{
    public function index(){
            
        $recepcionistas[] = [
            "nome"  => "Camila",
            "cpf"   => "111111111111"
        ];

        $recepcionistas[] = [
            "nome"  => "Maria",
            "cpf"   => "111111111111"
        ];

        $recepcionistas[] = [
            "nome"  => "Yasmim",
            "cpf"   => "111111111111"
        ];

        return view('recepcionistas.index', compact('recepcionistas'));
    }
}
