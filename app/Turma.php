<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
    	'descricao','data_inicial','data_final','serie','ano','turno'
    ];
}
