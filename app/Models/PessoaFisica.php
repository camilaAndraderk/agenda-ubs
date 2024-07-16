<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    use HasFactory;
    protected $fillable = ['cpf', 'nascimento'];

    public function pessoa(){

        return $this->hasOne(Pessoa::class, 'id_pessoa');
    }
}
