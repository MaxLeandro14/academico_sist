<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisciplinaProfessor extends Model
{
    protected $fillable = [
    	'id_disciplina','id_professor'
    ];
}
