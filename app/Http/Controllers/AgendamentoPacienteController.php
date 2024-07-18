<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendamentoPacienteController extends Controller
{
    public function index(Request $request){

        $mensagemSucesso    = $request->session()->get('mensagem.sucesso');
        $mensagemErro       = $request->session()->get('mensagem.erro');
        
      return view('agendamento-paciente.index');
    }

}
