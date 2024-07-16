<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UbsFormRequest;
use App\Models\Pessoa;
use App\Models\PessoaJuridica;

class UbsController extends Controller
{
    // unidades básicas de saúde

    public function index(){

        $ubs = Pessoa::all();
        dd($ubs);

        return view('ubs.index');
    }

    public function create(){

        return view('ubs.cadastrar');
    }

    public function store(UbsFormRequest $request){

        $pessoa         = new Pessoa();
        $pessoaJuridica = new PessoaJuridica();

        $pessoa->nome       = $request->nome;
        $pessoa->logradouro = $request->logradouro;
        $pessoa->bairro     = $request->bairro;
        $pessoa->numero     = $request->numero;
        $pessoa->cep        = $request->cep;
        $pessoa->cidade     = $request->cidade;
        $pessoa->estado     = $request->estado;
        $pessoa->email      = $request->email;
        $pessoa->telefone   = $request->telefone;

        if($pessoa->save()){
            
            // $pessoaJuridica->razao_social   = $request->razao_social;
            $pessoaJuridica->cnpj           = $request->cnpj;
            $pessoaJuridica->situacao       = $request->situacao;
            $pessoaJuridica->id_pessoa      = $pessoa->id;

            $pessoaJuridica->save();
        }

        return redirect('ubs.index');
    }
}
