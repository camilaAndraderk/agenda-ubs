<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AgendamentoPaciente extends Model
{
    use HasFactory;


    public static function inicioDoMes($mes, $ano){
        //retorna um inteiro com o dia da semana em que o mês começa
        //0 para domingo
        //1 para segunda
        //2 para terça ...

        $data = date($ano."-".$mes."-01");

        // Dia da semana (0 = domingo, 1 = segunda, 2 = terca ...)
        $diaSemanaNumero = date('w', strtotime($data));//dia da semana do dia 1

        return $diaSemanaNumero;
    }

    public static function consultasDoMes($mes, $ano, $idMedico){
        //retorna um array com as consultas para o mês atual

        $mesAno = $ano."-".$mes;

        $dados = DB::select("
            SELECT
                ap.id as id_consulta,
                paciente.nome as nome_paciente,
                medico.nome as nome_medico,
                ubs.nome as nome_ubs,
                ap.data,
                ap.situacao_consulta,
                ap.categoria_paciente,
                ap.avaliacao_medica
            FROM
                agendamento_pacientes ap
            INNER JOIN
                pessoas paciente
                ON
                paciente.id = ap.id_paciente
            INNER JOIN
                pessoas medico
                ON
                medico.id = ap.id_medico
            INNER JOIN
                pessoas_juridicas pj
                ON
                ap.id_ubs = pj.id
            INNER JOIN
                pessoas ubs
                ON
                ubs.id = pj.id_pessoa
            WHERE
                medico.id = ?
                AND
                DATE_FORMAT(ap.data, '%Y-%m') = ?
                ",
            [$idMedico, $mesAno]
        );
        $consultas = array();
        foreach($dados as $cadaConsulta){
          
            
            $data = explode(' ',$cadaConsulta->data);
            $data = $data[0];
          

            $consultas[$data][] = $cadaConsulta->id_consulta;
        }








        return $consultas;
    }

}
