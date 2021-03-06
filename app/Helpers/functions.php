<?php
if (! function_exists('getDisciplinaProfessor')) {
function getDisciplinaProfessor()
{
	$disciplinas_professores = DB::table('disciplina_professors')
	  ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
	  ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
    ->join('funcionarios', 'professors.id_funcionario', '=', 'funcionarios.id')
	  ->select('disciplina_professors.*','disciplinas.nome_disciplina', 'funcionarios.nome','professors.codigo_professor')
	  ->get();

  	return $disciplinas_professores;
}

}


if (! function_exists('getTodasTurmas')) {
function getTodasTurmas()
{
	$turmas = DB::table('turmas')
      ->select('turmas.*')
      ->orderByRaw('created_at','ASC')
      ->get();

  	return $turmas;
}

}


if (! function_exists('getTurmaWhereID')) {
function getTurmaWhereID($id_turma)
{
	$turma_info = DB::table('turma_disciplinas')
	->join('turmas', 'turma_disciplinas.id_turma', '=', 'turmas.id')
	->join('disciplina_professors', 'turma_disciplinas.id_disciplina_professor', '=', 'disciplina_professors.id')
	->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
	->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
  ->join('funcionarios', 'professors.id_funcionario', '=', 'funcionarios.id')
	->select('turmas.*','funcionarios.nome as nome_professor','professors.codigo_professor','disciplinas.nome_disciplina','disciplinas.id as id_disciplina')->where('turmas.id', '=', $id_turma)
	->first();

  	return $turma_info;
}

}



if (! function_exists('getAlunosTurma')) {
function getAlunosTurma($id_turma)
{
	$alunos_turma = DB::table('turma_alunos')
      ->join('turmas', 'turma_alunos.id_turma', '=', 'turmas.id')
      ->join('alunos', 'turma_alunos.id_aluno', '=', 'alunos.id')
      ->select('turma_alunos.*','turma_alunos.status as status_aluno_turma','alunos.id as id_aluno','alunos.status','alunos.codigo_aluno','alunos.nome_aluno','alunos.cpf','alunos.situacao_procedencia')->where('turmas.id', '=', $id_turma)
      ->get();

  	return $alunos_turma;
}

}



if (! function_exists('getNotaAlunos')) {
function getNotaAlunos($id_turma,$nome_bimestre,$id_disciplina)
{
  $notas_alunos = DB::table('diario_professors')
  ->join('alunos', 'diario_professors.id_aluno', '=', 'alunos.id')
  ->join('turmas', 'diario_professors.id_turma', '=', 'turmas.id')
  ->select('diario_professors.*')->where([['turmas.id', '=', $id_turma],['diario_professors.nome_bimestre','=',$nome_bimestre],['diario_professors.id_disciplina', '=', $id_disciplina]])
  ->get();

    return $notas_alunos;
}

}



if (! function_exists('getIdAlunos')) {
function getIdAlunos($id_turma,$nome_bimestre,$id_disciplina)
{
  $id_alunos = DB::table('diario_professors')
  ->join('alunos', 'diario_professors.id_aluno', '=', 'alunos.id')
  ->join('turmas', 'diario_professors.id_turma', '=', 'turmas.id')
  ->select('alunos.id')->where([['turmas.id', '=', $id_turma],['diario_professors.nome_bimestre','=',$nome_bimestre],['diario_professors.id_disciplina', '=', $id_disciplina]])
  ->get();

    return $id_alunos;
}

}




if (! function_exists('getProfessoresTurma')) {
function getProfessoresTurma($id_turma)
{
  $professores_turma = DB::table('turma_disciplinas')
  ->join('turmas', 'turma_disciplinas.id_turma', '=', 'turmas.id')
  ->join('disciplina_professors', 'turma_disciplinas.id_disciplina_professor', '=', 'disciplina_professors.id')
  ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
  ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
  ->join('funcionarios', 'professors.id_funcionario', '=', 'funcionarios.id')
  ->select('disciplina_professors.id as id_disciplina_professor','turma_disciplinas.id as id_turma_disciplina','turmas.id as id_turma','funcionarios.nome','professors.codigo_professor','professors.id as id_professor','disciplinas.nome_disciplina','disciplinas.id as id_disciplina')->where('turmas.id', '=', $id_turma)
  ->get();

    return $professores_turma;
}

}



if (! function_exists('getAlunos')) {
function getAlunos()
{
  
  $todos_alunos = DB::table('alunos')
  ->whereNotIn('id', function ($query) 
    {
    $query->select('id_aluno')
    ->from('turma_alunos');
    })
  ->where('status', '=', 'ATIVO')
  ->orderByRaw('nome_aluno','ASC')
    ->get();

    return $todos_alunos;
}

}



if (! function_exists('getProfessoresNotIn')) {
function getProfessoresNotIn($id_turma)
{
  $id_disciplina_professor =  DB::table('disciplina_professors')
  ->leftJoin('turma_disciplinas', 'disciplina_professors.id', '=', 'turma_disciplinas.id_disciplina_professor')
  ->select('turma_disciplinas.id_disciplina_professor as id')
  ->where('turma_disciplinas.id_turma', '=',$id_turma)
  ->get();
  $id_disciplina_professor = json_decode(json_encode($id_disciplina_professor),true);
  
  foreach ($id_disciplina_professor as $key => $value) {
    $id[$key] = $value['id'];
  }

  $professores = DB::table('turma_disciplinas')
  ->join('turmas', 'turma_disciplinas.id_turma', '=', 'turmas.id')
  ->leftJoin('disciplina_professors', 'turma_disciplinas.id_disciplina_professor', '=', 'disciplina_professors.id')
  ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
  ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
  ->join('funcionarios', 'professors.id_funcionario', '=', 'funcionarios.id')
  ->select('turma_disciplinas.id_disciplina_professor','funcionarios.nome','professors.codigo_professor','professors.id as id_professor','disciplinas.nome_disciplina','disciplinas.id as id_disciplina')
  ->whereNotIn('turma_disciplinas.id_disciplina_professor', $id )
  ->distinct()
  ->get();

  
  return $professores;
}

}



if (! function_exists('getProfessores')) {
function getProfessores()
{
  
  $professores = DB::table('professors')
  ->join('funcionarios', 'professors.id_funcionario', '=', 'funcionarios.id')
  ->select('funcionarios.*','professors.codigo_professor')
  ->get();

    return $professores;
}

}



if (! function_exists('getTurmaDisciplinaWhereID')) {
function getTurmaDisciplinaWhereID($codigo_professor)
{
  $turma_disciplina_professor = DB::table('turma_disciplinas')
  ->join('turmas', 'turma_disciplinas.id_turma', '=', 'turmas.id')
  ->join('disciplina_professors', 'turma_disciplinas.id_disciplina_professor', '=', 'disciplina_professors.id')
  ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
  ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
  ->join('funcionarios', 'professors.id_funcionario', '=', 'funcionarios.id')
  ->select('turmas.*','funcionarios.nome','professors.codigo_professor','disciplinas.nome_disciplina','disciplinas.id as id_disciplina')->where('professors.codigo_professor', '=', $codigo_professor)
  ->get();

    return $turma_disciplina_professor;
}

}


if (! function_exists('geraCodigoProfessor')) {
function geraCodigoProfessor()
{
	$codigo_professor = strtoupper(bin2hex(random_bytes(2)));
  	while (DB::table('professors')->where('codigo_professor', '=', $codigo_professor)->count() > 0) {
    	$codigo_professor = strtoupper(bin2hex(random_bytes(2)));
  	}

  	return $codigo_professor;
}

}



if (! function_exists('geraCodigoAluno')) {
function geraCodigoAluno()
{

  $codigo_aluno = date('Y').strtoupper(bin2hex(random_bytes(2)));

    while (DB::table('alunos')->where('codigo_aluno', '=', $codigo_aluno)->count() > 0) {
      $codigo_aluno = date('Y').strtoupper(bin2hex(random_bytes(2)));
    }

    return $codigo_aluno;
}

}



if (! function_exists('geraCodigoTurma')) {
function geraCodigoTurma()
{
  $codigo_turma = strtoupper(bin2hex(random_bytes(3)));
    while (DB::table('turmas')->where('codigo_turma', '=', $codigo_turma)->count() > 0) {
      $codigo_turma = strtoupper(bin2hex(random_bytes(3)));
    }

    return $codigo_turma;
}

}


if (! function_exists('formataDadosTurma')) {
function formataDadosTurma($professor_disciplina,$req,$codigo_turma)
{
	$dados = explode(',', $professor_disciplina[0]);
    $input = $req->except('professores');
    $input['codigo_turma'] = $codigo_turma;
 	  $ano_letivo = explode('/',date( 'd/m/Y' , strtotime($input['data_inicial'])));
  	$ano_letivo = $ano_letivo[2];
  	$input['ano_letivo'] = $ano_letivo;
  	return $input;
}

}



if (! function_exists('formataDadosTurmaDisciplina')) {
function formataDadosTurmaDisciplina($professor_disciplina,$id_turma)
{
	$dados = explode(',', $professor_disciplina);
    $input['id_disciplina_professor'] = $dados[0];
    $input['id_disciplina'] = $dados[1];
    $input['id_professor'] = $dados[2];  
    $input['id_turma'] = $id_turma;
  	return $input;
}

}

if (! function_exists('formataDadosDisciplinaProfessor')) {
function formataDadosDisciplinaProfessor($req,$disciplina,$formProfessor)
{
	$input = $req->except('id_disciplina');
    $input['id_disciplina'] = $disciplina;
    $input['id_professor'] = $formProfessor->id;
  	return $input;
}

}



if (! function_exists('formataDadosDiarioProfessor')) {
function formataDadosDiarioProfessor($req,$info)
{
    $input = $req->except('id_alunos');
    $input['id_turma_disciplina'] = $info->id_turma_disciplina;
    $input['id_professor']        = $info->id_professor;
    $input['id_disciplina']       = $info->id_disciplina;
    
    return $input;
}

}


if (! function_exists('updateParcela')) {
function updateParcela($req, $id_parcela, $mes_parcela)
{
  $debug = DB::table('parcelas')
    ->where('id', $id_parcela)
    ->where('mes_parcela', $mes_parcela)
    ->update(['status' => $req->input('status'),'data_pagamento' => $req->input('data_pagamento')]);


    return $debug;
}

}



if (! function_exists('formataNotas')) {
function formataNotas($id_alunos,$dados)
{

  foreach ($id_alunos as $aluno) {
    $notas[$aluno->id] = array(
        $dados['avaliacao_etapa1,'.$aluno->id],
        $dados['atividade_etapa1,'.$aluno->id],
        $dados['trabalhos_etapa1,'.$aluno->id],
        $dados['avaliacao_etapa2,'.$aluno->id],
        $dados['atividade_etapa2,'.$aluno->id],
        $dados['trabalhos_etapa2,'.$aluno->id]
    );
  }

  return $notas;

}

}


if (! function_exists('updateNotas')) {
function updateNotas($id_alunos,$notas,$bimestre)
{
  foreach ($notas as $id_aluno => $nota) {
  
    DB::table('diario_professors')
    ->where('id_aluno', $id_aluno)
    ->where('nome_bimestre', $bimestre)
    ->update([
      'avaliacao_etapa1' => $nota[0],
      'atividade_etapa1' => $nota[1],
      'trabalhos_etapa1' => $nota[2],
      'avaliacao_etapa2' => $nota[3],
      'atividade_etapa2' => $nota[4],
      'trabalhos_etapa2' => $nota[5],
    ]);
    
  }

}

}
?>