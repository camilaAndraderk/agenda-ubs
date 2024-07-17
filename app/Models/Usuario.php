<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $with = ['papel', 'pessoa'];
    protected $fillable = ['usuario', 'senha'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    public function usuarioUbs()
    {
        return $this->hasOne(UsuarioUbs::class, 'id_usuario', 'id');
    }

}
