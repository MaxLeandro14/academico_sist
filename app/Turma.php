<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
    	'descricao','codigo_turma','data_inicial','data_final','nivel','ano','turno','ano_letivo','status'
    ];
}
