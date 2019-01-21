<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaDisciplina extends Model
{
    protected $fillable = [
    	'id_turma','id_disciplina_professor','id_disciplina','id_professor'
    ];
}
