<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boletim extends Model
{
    protected $fillable = [
    	'prova_final','media_final','id_diario_professor'
    ];
}
