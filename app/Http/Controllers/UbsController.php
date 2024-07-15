<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UbsController extends Controller
{
    // unidades básicas de saúde

    public function create(){

        return view('ubs.cadastrar');
    }
}
