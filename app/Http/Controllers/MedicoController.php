<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    // exibindo dados
    public function index(Request $request){
        
        $mensagemSucesso    = $request->session()->get('mensagem.sucesso');
        $mensagemErro       = $request->session()->get('mensagem.erro');

            $pessoas = Pessoa::whereHas('usuario', function ($query) {
                $query->where('papel', 'Médico');
            })
            ->with('pessoaFisica')
            ->get();

        $medicos = [];

        foreach ($pessoas as $pessoa) {
            $medicos[] = [
                'id'    => $pessoa->id,
                'nome'  => $pessoa->nome,
                'cpf'  => $pessoa->pessoaFisica->cpf
            ];
        }

        return view('medico.index')
            ->with('medicos', $medicos)
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('mensagemErro', $mensagemErro);
    }

}
