<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiarioProfessor extends Model
{
    protected $fillable = [
    	'avaliacao_etapa1','atividade_etapa1','trabalhos_etapa1','avaliacao_etapa2','atividade_etapa2','trabalhos_etapa2','total_pontos','media','recuperacao','media_bimestral','faltas_bimestral','nome_bimestre','id_turma_disciplina','id_disciplina','id_professor','id_turma','id_aluno'
    ];
}
