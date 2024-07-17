<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

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

}
