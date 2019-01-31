<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
    	'nome','sexo','cpf','telefone','nacionalidade','cidade','cep','endereco','data_nascimento','local_nascimento','uf_local_nascimento','identidade','data_emissao_identidade','orgao_emissor','uf_orgao_emissor','titulo_eleitor','zona','secao','carteira_reservista','categoria','ctps','serie_ctps','uf_ctps','data_emissao_ctps','pis_pasep','nome_pai','nome_mae','estado_civil','conjuge','escolaridade','grau_conclusao','data_admissao','salario','id_cargo','carga_horaria_mensal','carga_horaria_semanal','dias_contrato','dias_prorrogacao'
    ];
}
