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
function getTurmaWhereID($codigo_turma)
{
	$turma_info = DB::table('turma_disciplinas')
	->join('turmas', 'turma_disciplinas.id_turma', '=', 'turmas.id')
	->join('disciplina_professors', 'turma_disciplinas.id_disciplina_professor', '=', 'disciplina_professors.id')
	->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
	->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
  ->join('funcionarios', 'professors.id_funcionario', '=', 'funcionarios.id')
	->select('turmas.*','funcionarios.nome','professors.codigo_professor','disciplinas.nome_disciplina')->where('turmas.codigo_turma', '=', $codigo_turma)
	->get();

  	return $turma_info;
}

}



if (! function_exists('getAlunoWhereID')) {
function getAlunoWhereID($id_aluno)
{
  $aluno_parcela = DB::table('alunos')
  ->join('parcelas', 'alunos.id', '=', 'parcelas.id_aluno')
  ->select('alunos.*','parcelas.valor_parcela')->where('alunos.id', '=', $id_aluno)
  ->first();

    return $aluno_parcela;
}

}



if (! function_exists('getAlunosTurmaWhereID')) {
function getAlunosTurmaWhereID($codigo_turma)
{
	$alunos_turma = DB::table('turma_alunos')
      ->join('turmas', 'turma_alunos.id_turma', '=', 'turmas.id')
      ->join('alunos', 'turma_alunos.id_aluno', '=', 'alunos.id')
      ->select('turma_alunos.*','alunos.nome_aluno','alunos.cpf','alunos.situacao_procedencia')->where('turmas.codigo_turma', '=', $codigo_turma)
      ->get();

  	return $alunos_turma;
}

}



if (! function_exists('getAlunos')) {
function getAlunos()
{
  
  $todos_alunos = DB::table('alunos')
  ->whereNotIn('id',
    function ($query) 
    {
    $query->select('id_aluno')
    ->from('turma_alunos');
    })
    ->get();

    return $todos_alunos;
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
  ->select('turmas.*','professors.nome_professor','professors.codigo_professor','disciplinas.nome_disciplina')->where('professors.codigo_professor', '=', $codigo_professor)
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
 	  $input['id_disciplina_professor'] = $dados[0];
  	$input['id_disciplina'] = $dados[1];
  	$input['id_professor'] = $dados[2];
	  
  	$ano_letivo = explode('/',date( 'd/m/Y' , strtotime($input['data_inicial'])));
  	$ano_letivo = $ano_letivo[2];
  	$input['ano_letivo'] = $ano_letivo;
  	return $input;
}

}



if (! function_exists('formataDadosTurmaDisciplina')) {
function formataDadosTurmaDisciplina($professor_disciplina,$form)
{
	$dados = explode(',', $professor_disciplina);
    $input['id_disciplina_professor'] = $dados[0];
    $input['id_disciplina'] = $dados[1];
    $input['id_professor'] = $dados[2];  
    $input['id_turma'] = $form->id;
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
?>