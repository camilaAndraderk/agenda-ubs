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

    public function pessoa(){

        return $this->hasOne(Pessoa::class, 'id');
    }


    public function scopeMedicos(Builder $query){
        
        return $query->where('papel', 'Médico');
    }

    public function scopeRecepcionistas(Builder $query){
        
        return $query->where('papel', 'Recepcionista');
    }

}
