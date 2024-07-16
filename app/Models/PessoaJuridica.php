<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    use HasFactory;
    protected $table = 'pessoas_juridicas';
    protected $fillable = ['cnpj', 'situacao', 'razao_social', 'id_pessoa'];

    public function pessoa(){

        return $this->hasOne(Pessoa::class, 'id_pessoa');
    }

}
