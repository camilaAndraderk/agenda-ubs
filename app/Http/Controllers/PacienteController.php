<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\PacienteAtualizarFormRequest;
use App\Http\Requests\PacienteFormRequest;
use App\Models\Paciente;
use App\Models\Pessoa;
use App\Models\PessoaFisica;
use Carbon\Carbon;
use GMP;
use Illuminate\Http\Request;
use PHPUnit\TextUI\Help;

class PacienteController extends Controller
{
      // exibindo dados
    public function index(Request $request){
        
        $mensagemSucesso    = $request->session()->get('mensagem.sucesso');
        $mensagemErro       = $request->session()->get('mensagem.erro');
        
        $pacientesObj   = Paciente::with('pessoa.pessoaFisica')->get();        
        $pacientes      = [];
        
        foreach ($pacientesObj as $cadapPacienteObj) {
            
            $pacientes[] = [
                'id'    => $cadapPacienteObj->id_pessoa,
                'nome'  => $cadapPacienteObj->pessoa->nome,
                'cpf'  =>  $cadapPacienteObj->pessoa->pessoaFisica->cpf,
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
            }

        }
        
        return to_route('paciente.index');
    }

    // mostrando detalhes
    public function show(int $idPessoa){
           
        $dados = Paciente::buscaDadosCompletosPaciente($idPessoa);

        $dataNascimento = Carbon::parse($dados->nascimento)->format('d/m/Y');
        
        $paciente['nome']['label']          = 'Nome';
        $paciente['nome']['valor']          = (empty($dados->nome)                  ? '-' : $dados->nome);

        $paciente['cpf']['label']           = 'cpf';
        $paciente['cpf']['valor']           = (empty($dados->cpf)                   ? '-' : $dados->cpf);

        $paciente['nascimento']['label']    = 'Data de Nascimento';
        $paciente['nascimento']['valor']    = (empty($dataNascimento)               ? '-' : $dataNascimento);

        $paciente['email']['label']         = 'E-mail';
        $paciente['email']['valor']         = (empty($dados->email)                 ? '-' : $dados->email);

        $paciente['telefone']['label']      = 'Telefone';
        $paciente['telefone']['valor']      = (empty($dados->telefone)              ? '-' : $dados->telefone);

        $paciente['logradouro']['label']    = 'Logradouro';
        $paciente['logradouro']['valor']    = (empty($dados->logradouro)            ? '-' : $dados->logradouro);

        $paciente['bairro']['label']        = 'Bairro';
        $paciente['bairro']['valor']        = (empty($dados->bairro)                ? '-' : $dados->bairro);

        $paciente['numero']['label']        = 'Número';
        $paciente['numero']['valor']        = (empty($dados->numero)                ? '-' : $dados->numero);

        $paciente['cep']['label']           = 'CEP';
        $paciente['cep']['valor']           = (empty($dados->cep)                   ? '-' : $dados->cep);

        $paciente['cidade']['label']        = 'Cidade';
        $paciente['cidade']['valor']        = (empty($dados->cidade)                ? '-' : $dados->cidade);

        $paciente['estado']['label']        = 'Estado';
        $paciente['estado']['valor']        = (empty($dados->estado)                ? '-' : $dados->estado);

        $paciente['comorbidades']['label']  = 'Comorbidades';
        $paciente['comorbidades']['valor']  = (empty($dados->comorbidades)          ? '-' : $dados->comorbidades);

        $paciente['observacao']['label']    = 'Observação';
        $paciente['observacao']['valor']    = (empty($dados->observacao_paciente)   ? '-' : $dados->observacao_paciente);

        return view('paciente.detalhes', compact(['paciente']));
            
    }

    // formulário de edição
    public function edit(int $idPessoa){

        $dados = Paciente::buscaDadosCompletosPaciente($idPessoa);
        
        $paciente = [
            'id'            => $dados->id_pessoa,
            'cpf'           => $dados->cpf,
            'nascimento'    => $dados->nascimento,
            'nome'          => $dados->nome,
            'logradouro'    => $dados->logradouro,
            'bairro'        => $dados->bairro,
            'numero'        => $dados->numero,
            'cep'           => $dados->cep,
            'cidade'        => $dados->cidade,
            'estado'        => $dados->estado,
            'email'         => $dados->email,
            'telefone'      => $dados->telefone,
            'comorbidades'  => $dados->comorbidades,
            'observacao'    => $dados->observacao_paciente,

        ];

        return view('paciente.editar', compact('paciente'));

    }

    public function update(int $idPessoa, PacienteAtualizarFormRequest $request){
        
        $pessoa = Pessoa::query()
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
            
            // Editando pessoa física
            $pessoaFisica = PessoaFisica::query()
                ->where('id_pessoa', $pessoa->id)
                ->first();

            $pessoaFisicaDados = [
                'nascimento' => $request->nascimento
            ];

            $pessoaFisica->fill($pessoaFisicaDados);
            $pessoaFisica->save();


            if($pessoaFisica){

                // Informações de paciente

                $dadosPaciente = [
                    'comorbidades'  => $request->comorbidades,
                    'observacao'    => $request->observacao,
                    'id_pessoa'     => $pessoa->id,
                ];
                
                Paciente::create($dadosPaciente);


                // Editando ubs que o usuário possui acesso
                $usuario = Usuario::where('id_pessoa', $pessoa->id)
                            ->first();

                $usuarioUbs = UsuarioUbs::where('id_usuario', $usuario->id)
                                ->first();
                $dadosUsuarioUbs = [
                    'id_ubs' => $request->ubs
                ];

                $usuarioUbs->fill($dadosUsuarioUbs);
                $usuarioUbs->save();
            }

            $request->session()->flash('mensagem.sucesso', "Recepcionista '{$pessoa->nome}' editada com sucesso");
        }

        return to_route( 'paciente.index');
    }

}