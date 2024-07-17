<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Requests\RecepcionistaFormRequest;
use App\Models\Pessoa;
use App\Models\PessoaFisica;
use App\Models\PessoaJuridica;
use App\Models\Usuario;
use App\Models\UsuarioUbs;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\Help;

class RecepcionistaController extends Controller
{
    // exibindo dados
    public function index(Request $request){
        
        $mensagemSucesso    = $request->session()->get('mensagem.sucesso');
        $mensagemErro       = $request->session()->get('mensagem.erro');

            $pessoas = Pessoa::whereHas('usuario', function ($query) {
                $query->where('papel', 'Recepcionista');
            })
            ->with('pessoaFisica')
        
            ->get();
        
        foreach ($pessoas as $pessoa) {
            $recepcionistas[] = [
                'id'    => $pessoa->id,
                'nome'  => $pessoa->nome,
                'cpf'  => $pessoa->pessoaFisica->cpf
            ];
        }

        return view('recepcionista.index')
            ->with('recepcionistas', $recepcionistas)
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('mensagemErro', $mensagemErro);
    }

    // formulário de criação
    public function create(){
            
        $pessoasJuridicas = PessoaJuridica::with('pessoa')
                            ->where('situacao', 'ativa')
                            ->get();
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
        
        // Veridicando se o CPF ja existe no banco

        $cpf = Pessoa::limpaStringNumerica($request->cpf);

        $pessoaJaCadastrada = PessoaFisica::where('cpf',  $cpf)->first();

        if($pessoaJaCadastrada != null){
            
            $request->session()->flash('mensagem.erro', "O cadastro não pode ser realizado pois o cpf '{$request->cpf}' já existe."); 

            return to_route('recepcionista.index');            
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
                // Informações de usuário
                $senhaUsuario   = Carbon::parse($request->nascimento)->format('dmY');
                $papel          = "Recepcionista";
                
                $usuarioDados = [
                    'id_pessoa' => $pessoa->id,
                    'usuario'   => $pessoaFisica->cpf,
                    'senha'     => $senhaUsuario,
                    'papel'     => $papel
                ];
                
                $usuario = Usuario::create($usuarioDados);
                
                
                if($usuario){
                    
                    // Informações do usuário x ubs
                    $dadosUsuarioUbs = [
                        'id_usuario'    => $usuario->id,
                        'id_ubs'        => $request->ubs
                    ];
                    
                    $usuarioUbs = UsuarioUbs::create($dadosUsuarioUbs);

                    $request->session()->flash('mensagem.sucesso', "Recepcionista '{$pessoa->nome}' cadastrada com sucesso");
                }

            }

        }
        
        return to_route('recepcionista.index');
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
    public function show(int $idPessoa){
    
        // $pessoaFisica = PessoaFisica::with('pessoa')
        //             ->where('id', $idPessoa)
        //             ->first();
        
        // $idPessoa  = $pessoaFisica->pessoa->nome;               
        // $usuario   = Usuario::where('id_pessoa', $idPessoa)

        
        $dados = DB::select("
            SELECT        
                    pf.id AS 'id_pessoa',
                    pf.nome,
                    pf.telefone,
                    pf.email,
                    pf.logradouro,
                    pf.numero,
                    pf.bairro,
                    pf.cidade,
                    pf.estado,
                    pf.cep,
                    pessoas_fisicas.id AS 'id_pessoa_fisica',
                    pessoas_fisicas.cpf,
                    pessoas_fisicas.nascimento,
                    usuarios.id AS 'id_usuario',
                    usuarios.papel,
                    pj.id AS 'id_ubs',
                    pj.nome AS 'nome_ubs'
                FROM
                    pessoas pf
                INNER JOIN
                    pessoas_fisicas
                    ON
                    pessoas_fisicas.id_pessoa = pf.id
                INNER JOIN
                    usuarios
                    ON
                    usuarios.id_pessoa = pf.id
                INNER JOIN
                    usuario_ubs
                    ON
                    usuario_ubs.id_usuario = usuarios.id
                INNER JOIN
                    pessoas_juridicas
                    ON
                    pessoas_juridicas.id = usuario_ubs.id_ubs
                INNER JOIN
                    pessoas pj
                    ON
                    pj.id = pessoas_juridicas.id_pessoa
                WHERE
                    pf.id = ?",
            [$idPessoa]
        );

        $dados      = $dados[0];
        $dataNascimento = Carbon::parse($dados->nascimento)->format('d/m/Y');
        

        $recepcionista['nome']['label']          = 'Nome';
        $recepcionista['nome']['valor']          = (empty($dados->nome)          ? '-' : $dados->nome);

        $recepcionista['cpf']['label']           = 'cpf';
        $recepcionista['cpf']['valor']           = (empty($dados->cpf)           ? '-' : $dados->cpf);

        $recepcionista['nascimento']['label']    = 'Data de Nascimento';
        $recepcionista['nascimento']['valor']    = (empty($dataNascimento)       ? '-' : $dataNascimento);

        $recepcionista['email']['label']         = 'E-mail';
        $recepcionista['email']['valor']         = (empty($dados->email)         ? '-' : $dados->email);

        $recepcionista['telefone']['label']      = 'Telefone';
        $recepcionista['telefone']['valor']      = (empty($dados->telefone)      ? '-' : $dados->telefone);

        $recepcionista['logradouro']['label']    = 'Logradouro';
        $recepcionista['logradouro']['valor']    = (empty($dados->logradouro)    ? '-' : $dados->logradouro);

        $recepcionista['bairro']['label']        = 'Bairro';
        $recepcionista['bairro']['valor']        = (empty($dados->bairro)        ? '-' : $dados->bairro);

        $recepcionista['numero']['label']        = 'Número';
        $recepcionista['numero']['valor']        = (empty($dados->numero)        ? '-' : $dados->numero);

        $recepcionista['cep']['label']           = 'CEP';
        $recepcionista['cep']['valor']           = (empty($dados->cep)           ? '-' : $dados->cep);

        $recepcionista['cidade']['label']        = 'Cidade';
        $recepcionista['cidade']['valor']        = (empty($dados->cidade)        ? '-' : $dados->cidade);

        $recepcionista['estado']['label']        = 'Estado';
        $recepcionista['estado']['valor']        = (empty($dados->estado)        ? '-' : $dados->estado);

        $recepcionista['ubs']['label']          = 'Unidade Básica';
        $recepcionista['ubs']['valor']          = (empty($dados->nome_ubs)            ? '-' : $dados->nome_ubs);

        return view('recepcionista.detalhes', compact(['recepcionista']));
            
    }
}
