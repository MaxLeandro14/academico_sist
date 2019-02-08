<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
    	'nome_aluno', 'sexo','codigo_aluno', 'data_nascimento', 'cpf','fone','bairro','endereco','cidade','nome_pai','nome_mae','profissao_pai','profissao_mae','telefone_profissao_pai','telefone_profissao_mae','pai_mae_responsavel','outro_responsavel_nome','outro_responsavel_parentesco','outro_responsavel_endereco','outro_responsavel_telefone','colegio_procedencia','cidade_colegio_procedencia','uf_colegio_procedencia','situacao_procedencia','cep','data_matricula','data_cancelamento','valor_matricula','status'
    ];
}
