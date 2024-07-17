<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PessoaJuridica extends Model
{
    protected $table = 'pessoas_juridicas';
    protected $fillable = ['cnpj', 'situacao', 'razao_social', 'id_pessoa'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    public function usuarioUbs()
    {
        return $this->hasOne(UsuarioUbs::class, 'id_ubs', 'id');
    }

    public static function deletar($idPessoaJuridica){
        //  deleta pessoa jurídica e pessoa
        
        $pessoaJuridica = PessoaJuridica::query()
        ->where('id', $idPessoaJuridica)
        ->first();

        $idPessoa = $pessoaJuridica->id_pessoa;

        $pessoaJuridica::destroy($pessoaJuridica->id);
        Pessoa::destroy($idPessoa);
    }

    public static function ubsDeUmaPessoa($idPessoa){
        $dados = DB::select("
            SELECT        
                    pf.id AS 'id_pessoa',
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
                    pf.id = ?
                ORDER BY
                    pj.nome",
            [$idPessoa]
        );

        return $dados;
    }

}
