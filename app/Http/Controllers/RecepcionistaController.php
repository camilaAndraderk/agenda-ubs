<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Requests\RecepcionistaFormRequest;
use App\Models\Pessoa;
use App\Models\PessoaJuridica;

class RecepcionistaController extends Controller
{
    // exibindo dados
    public function index(){

        $recepcionistas[] = [
            "id"    => "1",
            "nome"  => "Camila",
            "cpf"   => "111111111111"
        ];

        $recepcionistas[] = [
            "id"    => "2",
            "nome"  => "Maria",
            "cpf"   => "111111111111"
        ];

        $recepcionistas[] = [
            "id"    => "3",
            "nome"  => "Yasmim",
            "cpf"   => "111111111111"
        ];

        return view('recepcionista.index',
            compact(
                'recepcionistas'
            )
        );
    }

    // formulário de criação
    public function create(){
            
        $pessoasJuridicas = PessoaJuridica::with('pessoa')->get();
        $ubs = [];

        foreach ($pessoasJuridicas as $pessoaJuridica) {
            $ubs[] = [
                'id'    => $pessoaJuridica->id,
                'nome'  => $pessoaJuridica->pessoa->nome,
                'cnpj'  => $pessoaJuridica->cnpj
            ];
        }

        return view('recepcionista.cadastrar', compact(['ubs']));
    }

    // salvando dados
    public function store(RecepcionistaFormRequest $request){
    
        Helper::pr($request);
        
        // return to_route('recepcionista.index')
        //     ->with('mensagem.sucesso', "Recepcionista '{$recepcionista->nome}' cadastrada com sucesso"); // flash messege
    }

    // deletando dados
    public function destroy(int $recepcionista){

   
        // return to_route('recepcionista.index')
        //     ->with('mensagem.sucesso', "Recepcionista' {$recepcionista->nome} 'removida com sucesso");
    }

    // formulário de edição
    public function edit(int $recepcionista){

        return view('recepcionista.editar', compact('recepcionista'));

    }

    // salvando atualizações
    public function update(RecepcionistaFormRequest $recepcionista, Request $request){


        // return to_route( 'recepcionista.index')
        //     ->with('mensagem.sucesso', "Recepcionista ' {$recepcionista->nome} ' editada com sucesso.");
    }

    // mostrando detalhes
    public function show(int $recepcionista){

        return to_route( 'recepcionista.show', compact($recepcionista));
    }

}
