<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = ['comorbidades', 'observacao', 'id_pessoa'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    // Busca dados das tabelas de pessoa, pessoa física, paciente
    public static function buscaDadosCompletosPaciente($idPessoa){

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
                    pacientes.id AS 'id_paciente',
                    pacientes.observacao AS 'observacao_paciente',
                    pacientes.comorbidades
                FROM
                    pessoas pf
                INNER JOIN
                    pessoas_fisicas
                    ON
                    pessoas_fisicas.id_pessoa = pf.id
                INNER JOIN
                    pacientes
                    ON
                    pacientes.id_pessoa = pf.id
                WHERE
                    pf.id = ?",
            [$idPessoa]
        );

        $dados = $dados[0];
        
        return $dados;
    }
}
