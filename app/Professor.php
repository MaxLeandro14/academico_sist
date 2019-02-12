<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
    	'nome_professor','codigo_professor','id_funcionario','id_cargo','primeiro_login'
    ];

    public function funcionario()
    {
    	return $this->hasOne(Funcionario::class,'id');
    }
}
