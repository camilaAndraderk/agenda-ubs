<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\PacienteFormRequest;
use App\Models\Paciente;
use App\Models\Pessoa;
use App\Models\PessoaFisica;
use GMP;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
      // exibindo dados
      public function index(Request $request){
        
        $mensagemSucesso    = $request->session()->get('mensagem.sucesso');
        $mensagemErro       = $request->session()->get('mensagem.erro');

        // $pessoas = Pessoa::whereHas('paciente', function ($query) {
        //                 $query->where('id');
        //             })
        //             ->with('pessoaFisica')
        //             ->get();
        
        // $pessoas = Pessoa::with('pessoaFisica')->with('paciente')->get();
        
        $pessoas = Paciente::with('pessoa.pessoaFisica')->get();

        // Helper::pr($pacientes);

        $pacientes = [];

        foreach ($pessoas as $pessoa) {
            $pacientes[] = [
                'id'    => $pessoa->id,
                'nome'  => $pessoa->nome,
                'cpf'  =>  $pessoa->pessoaFisica->cpf
            ];
        }

        return view('paciente.index')
            ->with('pacientes', $pacientes)
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('mensagemErro', $mensagemErro);
    }


     // formulário de criação
    public function create(){
        
        return view('paciente.cadastrar');
    }

     // salvando dados
     public function store(PacienteFormRequest $request){
        
        // Veridicando se o CPF ja existe no banco

        $cpf = Pessoa::limpaStringNumerica($request->cpf);

        $pessoaJaCadastrada = PessoaFisica::where('cpf',  $cpf)->first();

        if($pessoaJaCadastrada != null){
            
            $request->session()->flash('mensagem.erro', "O cadastro não pode ser realizado pois o cpf '{$request->cpf}' já existe."); 

            return to_route('paciente.index');            
        }

        // Salvando dados
        
        // Informações da pessoa
        $pessoaDados = [
            'nome'       => $request->nome,
            'logradouro' => $request->logradouro,
            'bairro'     => $request->bairro,
            'numero'     => $request->numero,
            'cep'        => $request->cep,
            'cidade'     => $request->cidade,
            'estado'     => $request->estado,
            'email'      => $request->email,
            'telefone'   => $request->telefone
        ];
        
        $pessoa = Pessoa::create($pessoaDados);

        if($pessoa){
        
            // Informações da pessoa física
            $pessoaFisicaDados = [
                'cpf'           => $cpf,
                'nascimento'    => $request->nascimento,
                'id_pessoa'     => $pessoa->id
            ];
            
            $pessoaFisica = PessoaFisica::create($pessoaFisicaDados);
            
            if($pessoaFisica){
                // Informações de paciente

                $dadosPaciente = [
                    'comorbidades'  => $request->comorbidades,
                    'observacao'    => $request->observacao,
                    'id_pessoa'     => $pessoa->id,
                ];
                
                $paciente = Paciente::create($dadosPaciente);

                Helper::pr($paciente);
            }

        }
        
        return to_route('paciente.index');
    }

}
