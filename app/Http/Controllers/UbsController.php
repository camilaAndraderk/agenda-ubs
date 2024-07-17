<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Requests\UbsFormRequest;
use App\Models\Pessoa;
use App\Models\PessoaJuridica;

class UbsController extends Controller
{
    // unidades básicas de saúde

    public function index(){

        $pessoasJuridicas = PessoaJuridica::with('pessoa')->get();
        $ubs = [];
        // Iterando sobre os resultados para exibir os dados
        foreach ($pessoasJuridicas as $pessoaJuridica) {
            $ubs[] = [
                'id'    => $pessoaJuridica->id,
                'nome'  => $pessoaJuridica->pessoa->nome,
                'cnpj'  => $pessoaJuridica->cnpj
            ];
        }

        return view('ubs.index', compact(['ubs']));
       
    }


    // tela de cadastro
    public function create(){

        return view('ubs.cadastrar');
    }


    // salvar novos dados
    public function store(UbsFormRequest $request){
        
        
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
            //registrando a pessoa jurídica usando o ID da pessoa física como chave estrangeira
            //  insert: p/ array de dados
            
            $pessoaJuridicaDados = [
                'cnpj'           => $request->cnpj,
                'razao_social'   => $request->razao_social,
                'situacao'       => $request->situacao,
                'id_pessoa'      => $pessoa->id
            ];

            PessoaJuridica::create($pessoaJuridicaDados);
        }

        return to_route('ubs.index')
            ->with('mensagem.sucesso', "Unidade Básica '{$pessoa->nome}' cadastrada com sucesso");
    }


    // deletar
    public function destroy(int $idPessoaJuridica){
        
        // Deletando pessoa jurídica e pessoa
        PessoaJuridica::deletar($idPessoaJuridica);

        return to_route('ubs.index')
            ->with('mensagem.sucesso', "Unidade Básica excluída com sucesso");

    }

    // Tela de edição
    public function edit(int $idPessoaJuridica){

        $pessoaJuridica = PessoaJuridica::with('pessoa')
                            ->where('id', $idPessoaJuridica)
                            ->first();
        $ubs = [
            'id'            => $pessoaJuridica->id,
            'cnpj'          => $pessoaJuridica->cnpj,
            'razao_social'  => $pessoaJuridica->razao_social,
            'situacao'      => $pessoaJuridica->situacao,
            'nome'          => $pessoaJuridica->pessoa->nome,
            'logradouro'    => $pessoaJuridica->pessoa->logradouro,
            'bairro'        => $pessoaJuridica->pessoa->bairro,
            'numero'        => $pessoaJuridica->pessoa->numero,
            'cep'           => $pessoaJuridica->pessoa->cep,
            'cidade'        => $pessoaJuridica->pessoa->cidade,
            'estado'        => $pessoaJuridica->pessoa->estado,
            'email'         => $pessoaJuridica->pessoa->email,
            'telefone'      => $pessoaJuridica->pessoa->telefone
        ];
        
        // Helper::pr($ubs);
        return view('ubs.editar', compact(['ubs']));
    }


    // salvar edição
    public function update(int $idPessoaJuridica, UbsFormRequest $request){

        $pessoaJuridica = PessoaJuridica::query()
            ->where('id', $idPessoaJuridica)
            ->first();

        $idPessoa   = $pessoaJuridica->id_pessoa;
        $pessoa     = Pessoa::query()
                            ->where('id', $idPessoa)
                            ->first();

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
        
        $pessoa->fill($pessoaDados);
        $pessoa->save();

        if($pessoa){
            $pessoaJuridicaDados = [
                'cnpj'           => $request->cnpj,
                'razao_social'   => $request->razao_social,
                'situacao'       => $request->situacao
            ];

            $pessoaJuridica->fill($pessoaJuridicaDados);
            $pessoaJuridica->save();
        }

        return to_route('ubs.index')
            ->with('mensagem.sucesso', "Unidade Básica '{$pessoa->nome}' editada com sucesso");
    }

    // mostrando detalhes
    public function show(int $idPessoaJuridica){

        $pessoaJuridica = PessoaJuridica::with('pessoa')
                            ->where('id', $idPessoaJuridica)
                            ->first();

        $ubs['nome']['label']          = 'Nome';
        $ubs['nome']['valor']          = (empty($pessoaJuridica->pessoa->nome)          ? '-' : $pessoaJuridica->pessoa->nome);

        $ubs['cnpj']['label']          = 'CNPJ';
        $ubs['cnpj']['valor']          = (empty($pessoaJuridica->cnpj)                  ? '-' : $pessoaJuridica->cnpj);

        $ubs['razao_social']['label']  = 'Razão Social';
        $ubs['razao_social']['valor']  = (empty($pessoaJuridica->razao_social)          ? '-' : $pessoaJuridica->razao_social);

        $ubs['situacao']['label']      = 'Situação';
        $ubs['situacao']['valor']      = (empty($pessoaJuridica->situacao)              ? '-' : $pessoaJuridica->situacao);

        $ubs['email']['label']         = 'E-mail';
        $ubs['email']['valor']         = (empty($pessoaJuridica->pessoa->email)         ? '-' : $pessoaJuridica->pessoa->email);

        $ubs['telefone']['label']      = 'Telefone';
        $ubs['telefone']['valor']      = (empty($pessoaJuridica->pessoa->telefone)      ? '-' : $pessoaJuridica->pessoa->telefone);

        $ubs['logradouro']['label']    = 'Logradouro';
        $ubs['logradouro']['valor']    = (empty($pessoaJuridica->pessoa->logradouro)    ? '-' : $pessoaJuridica->pessoa->logradouro);

        $ubs['bairro']['label']        = 'Bairro';
        $ubs['bairro']['valor']        = (empty($pessoaJuridica->pessoa->bairro)        ? '-' : $pessoaJuridica->pessoa->bairro);

        $ubs['numero']['label']        = 'Número';
        $ubs['numero']['valor']        = (empty($pessoaJuridica->pessoa->numero)        ? '-' : $pessoaJuridica->pessoa->numero);

        $ubs['cep']['label']           = 'CEP';
        $ubs['cep']['valor']           = (empty($pessoaJuridica->pessoa->cep)           ? '-' : $pessoaJuridica->pessoa->cep);

        $ubs['cidade']['label']        = 'Cidade';
        $ubs['cidade']['valor']        = (empty($pessoaJuridica->pessoa->cidade)        ? '-' : $pessoaJuridica->pessoa->cidade);

        $ubs['estado']['label']        = 'Estado';
        $ubs['estado']['valor']        = (empty($pessoaJuridica->pessoa->estado)        ? '-' : $pessoaJuridica->pessoa->estado);

        return view('ubs.detalhes', compact(['ubs']));
    }
}
