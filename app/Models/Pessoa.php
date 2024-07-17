<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    protected $fillable = ['nome', 'telefone', 'email', 'logradouro', 'numero', 'bairro', 'cidade', 'estado', 'cep'];

    public function pessoaJuridica()
    {
        return $this->hasOne(PessoaJuridica::class, 'id_pessoa', 'id');
    }

    public function pessoaFisica()
    {
        return $this->hasOne(PessoaFisica::class, 'id_pessoa', 'id');
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_pessoa', 'id');
    }

    public static function limpaStringNumerica($valor){

        $valor = preg_replace( array( '/[ ]/' , '/[^0-9]/' ) , array( '' , '' ) , $valor);
        return $valor;
    }
}