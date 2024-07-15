<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecepcionistasController extends Controller
{
    // exibindo dados
    public function index(Request $request){

        $mensagemSucesso    = session('mensagem.sucesso');
        $mensagemErro       = session('mensagem.erro');

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

        return view('recepcionistas.index',
            compact(
                'recepcionistas', 
                'mensagemSucesso'
            )
        );
    }

    // formulário de criação
    public function create(){
            
        // $nomePessoa = $request->input('nome');

        return view('recepcionistas.cadastrar');
    }

    // salvando dados
    public function store(RecepcionistaFormRequest $request){
    
        
        $recepcionista = Recepcionista::create($request->all());
        
        return to_route('recepcionistas.index')
            ->with('mensagem.sucesso', "Recepcionista '{$recepcionista->nome}' cadastrada com sucesso"); // flash messege
    }

    // deletando dados
    public function destroy(Recepcionista $recepcionista){

        // $recepcionistaId    = $request->id;
        // $recepcionista      = Recepcionista::find($recepcionistaId);

        // Recepcionista::destroy($recepcionistaId);

        // faz um select e depois um delete
        $recepcionista->delete();


        // Enviando mensagem de sucesso para a sessão
        // $request->session()->flash('mensagem.sucesso', "Recepcionista' {$recepcionista->nome} 'removida com sucesso");

        return to_route('recepcionistas.index')
            ->with('mensagem.sucesso', "Recepcionista' {$recepcionista->nome} 'removida com sucesso");
    }

    // formulário de edição
    public function edit(Recepcionista $recepcionista){

        return view('recepcionistas.editar', compact('recepcionista'));

    }

    // salvando atualizações
    public function update(RecepcionistaFormRequest $recepcionista, Request $request){

        $recepcionista->fill($request->all());
        $recepcionista->save();

        return to_route( 'recepcionista.index')
            ->with('mensagem.sucesso', "Recepcionista ' {$recepcionista->nome} ' editada com sucesso.");
    }

    // mostrando detalhes
    public function show(Recepcionista $recepcionista){

        return to_route( 'recepcionista.show', compact($recepcionista));
    }

}
