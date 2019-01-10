<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
    	'data_inicial','data_final','serie','descricao','ano','turno'
    ];
}
