<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $fillable = [
    	'valor_parcela','id_aluno','mes_parcela','status','data_pagamento'
    ];
}
