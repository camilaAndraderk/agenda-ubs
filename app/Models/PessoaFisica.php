<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PessoaFisica extends Model
{
    use HasFactory;
    protected $fillable = ['cpf', 'nascimento', 'id_pessoa'];
    protected $table   = 'pessoas_fisicas';

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }


    // Busca dados das tabelas de pessoa, pessoa física, usuário e ubs que o usuário está relacionado

    public static function buscaDadosCompletosPessoaFisica($idPessoa){

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
                    pessoas_fisicas.nascimento AS 'nascimento',
                    usuarios.id AS 'id_usuario',
                    usuarios.papel,
                    pessoas_juridicas.id AS 'id_ubs',
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
        
        $dados = $dados[0];

        return $dados;
    }
}
