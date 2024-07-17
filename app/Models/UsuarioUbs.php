<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioUbs extends Model
{
    use HasFactory;
    protected $fillable = ['id_usuario', 'id_ubs'];
    protected $table    = "usuario_ubs";

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    public function pessoaJuridica()
    {
        return $this->belongsTo(PessoaJuridica::class, 'id_ubs', 'id');
    }
}
