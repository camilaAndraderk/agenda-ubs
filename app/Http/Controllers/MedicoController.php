<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\MedicoFormRequest;
use App\Http\Requests\MedicoAtualizarFormRequest;
use App\Models\AgendamentoPaciente;
use App\Models\Pessoa;
use App\Models\PessoaFisica;
use App\Models\PessoaJuridica;
use App\Models\Usuario;
use App\Models\UsuarioUbs;
use Carbon\Carbon;
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

    // formulário de criação
    public function create(){
        
        // Buscando unidades básicas para seletor
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
        
        return view('medico.cadastrar', compact(['ubs']));
    }

    // salvando dados
    public function store(MedicoFormRequest $request){
        
        // Veridicando se o CPF ja existe no banco

        $cpf = Pessoa::limpaStringNumerica($request->cpf);

        $pessoaJaCadastrada = PessoaFisica::where('cpf',  $cpf)->first();

        if($pessoaJaCadastrada != null){
            
            $request->session()->flash('mensagem.erro', "O cadastro não pode ser realizado pois o cpf '{$request->cpf}' já existe."); 

            return to_route('medico.index');            
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
                $papel          = "Médico";
                
                $usuarioDados = [
                    'id_pessoa' => $pessoa->id,
                    'usuario'   => $pessoaFisica->cpf,
                    'senha'     => $senhaUsuario,
                    'papel'     => $papel
                ];
                
                $usuario = Usuario::create($usuarioDados);
                
                
                if($usuario){
                    
                    // Informações do usuário x ubs

                    $dadosUsuarioUbs = [];

                    foreach($request->ubs as $ubs){

                        $dadosUsuarioUbs[] = [
                            'id_usuario'    => $usuario->id,
                            'id_ubs'        => $ubs
                        ];
                    }

                    $usuarioUbs = UsuarioUbs::insert($dadosUsuarioUbs);

                    $request->session()->flash('mensagem.sucesso', "Médico(a) '{$pessoa->nome}' cadastrado com sucesso");
                }

            }

        }
        
        return to_route('medico.index');
    }

    // mostrando detalhes
    public function show(int $idPessoa){
       
        $dados = PessoaFisica::buscaDadosCompletosPessoaFisica($idPessoa);

        $ubs = PessoaJuridica::ubsDeUmaPessoa($idPessoa);


        $dataNascimento = Carbon::parse($dados->nascimento)->format('d/m/Y');
        
        $medico['nome']['label']          = 'Nome';
        $medico['nome']['valor']          = (empty($dados->nome)          ? '-' : $dados->nome);

        $medico['cpf']['label']           = 'cpf';
        $medico['cpf']['valor']           = (empty($dados->cpf)           ? '-' : $dados->cpf);

        $medico['nascimento']['label']    = 'Data de Nascimento';
        $medico['nascimento']['valor']    = (empty($dataNascimento)       ? '-' : $dataNascimento);

        $medico['email']['label']         = 'E-mail';
        $medico['email']['valor']         = (empty($dados->email)         ? '-' : $dados->email);

        $medico['telefone']['label']      = 'Telefone';
        $medico['telefone']['valor']      = (empty($dados->telefone)      ? '-' : $dados->telefone);

        $medico['logradouro']['label']    = 'Logradouro';
        $medico['logradouro']['valor']    = (empty($dados->logradouro)    ? '-' : $dados->logradouro);

        $medico['bairro']['label']        = 'Bairro';
        $medico['bairro']['valor']        = (empty($dados->bairro)        ? '-' : $dados->bairro);

        $medico['numero']['label']        = 'Número';
        $medico['numero']['valor']        = (empty($dados->numero)        ? '-' : $dados->numero);

        $medico['cep']['label']           = 'CEP';
        $medico['cep']['valor']           = (empty($dados->cep)           ? '-' : $dados->cep);

        $medico['cidade']['label']        = 'Cidade';
        $medico['cidade']['valor']        = (empty($dados->cidade)        ? '-' : $dados->cidade);

        $medico['estado']['label']        = 'Estado';
        $medico['estado']['valor']        = (empty($dados->estado)        ? '-' : $dados->estado);


        $mesAtual = date('m');
        $anoAtual = date('Y');

        $inicioDoMes  = AgendamentoPaciente::inicioDoMes($mesAtual, $anoAtual);
        $totalDiasMes = cal_days_in_month(CAL_GREGORIAN, $mesAtual, $anoAtual);

        $consultas = AgendamentoPaciente::consultasDoMes($mesAtual, $anoAtual, $idPessoa);
        


        return view('medico.detalhes', compact(['medico', 'ubs', 'inicioDoMes', 'mesAtual', 'anoAtual', 'consultas', 'totalDiasMes']));
        
    }

    // formulário de edição
    public function edit(int $idPessoa){


        $dados = PessoaFisica::buscaDadosCompletosPessoaFisica($idPessoa);

        
        


        $medico = [
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
            'ubs'           => $dados->id_ubs
        ];
        
        // Buscando unidades básicas para seletor
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
        $ubsCadastrados = PessoaJuridica::ubsDeUmaPessoa($idPessoa);
        $ubsJaCadastrados = array();
        foreach($ubsCadastrados as $cadaCadastro){
            $ubsJaCadastrados[] = $cadaCadastro->id_ubs;
        }
        // Helper::pr($ubsJaCadastrados);
        return view('medico.editar', compact('medico', 'ubs', 'ubsJaCadastrados'));
        
    }
    // salvando atualizações
    public function update(int $idPessoa, MedicoAtualizarFormRequest $request){
        
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


            $dados = PessoaFisica::buscaDadosCompletosPessoaFisica($idPessoa);
            $ubsAntigas = PessoaJuridica::ubsDeUmaPessoa($idPessoa);
            // echo "<pre>";
            // print_r($request->ubs);
            // exit();

            if($pessoaFisica){

                // Excluindo todos as USBs as quais o médico tem acesso
                foreach ($ubsAntigas as $cadaUbs) {
                    UsuarioUbs::destroy($cadaUbs->id_usuario_ubs);
                }

                // Editando ubs que o usuário possui acesso
                $dadosUsuarioUbs = [];

                    foreach($request->ubs as $ubs){

                        $dadosUsuarioUbs[] = [
                            'id_usuario'    => $dados->id_usuario,
                            'id_ubs'        => $ubs
                        ];
                    }

                    $usuarioUbs = UsuarioUbs::insert($dadosUsuarioUbs);
            }

            $request->session()->flash('mensagem.sucesso', "Médico(a) '{$pessoa->nome}' editada com sucesso");
        }

        return to_route( 'medico.index');
    } 
}
