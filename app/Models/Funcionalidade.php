<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionalidade extends Model
{
    use HasFactory;

    protected $table = 'funcionalidades';
    protected $fillable = ['label', 'rota'];

}
