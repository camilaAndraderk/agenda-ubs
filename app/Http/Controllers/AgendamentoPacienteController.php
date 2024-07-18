<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AgendamentoPaciente;
use Illuminate\Http\Request;

class AgendamentoPacienteController extends Controller
{
    public function index(Request $request){

        $mensagemSucesso    = $request->session()->get('mensagem.sucesso');
        $mensagemErro       = $request->session()->get('mensagem.erro');
        
        $agendamentos = AgendamentoPaciente::consultas();

        // Helper::pr($agendamentos);
      return view('agendamento-paciente.index', compact(['agendamentos']));
    }

}
