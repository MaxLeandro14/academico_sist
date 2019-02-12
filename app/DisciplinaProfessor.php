<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisciplinaProfessor extends Model
{
    protected $fillable = [
    	'id_disciplina','id_professor'
    ];

    public function professor()
    {
    	return $this->hasMany(Professor::class,'id');
    }

    public function disciplina()
    {
    	return $this->hasMany(Disciplina::class,'id');
    }
}
