<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turma;
class EditaController extends Controller
{
    public function index_turmas ()
    {
    	$turmas = Turma::all();
    	return view('painel/administrativo/editar/turma/index_turmas',compact('turmas'));
    }

    public function edita_turma($id_turma)
    {

	  $turma_info = getTurmaWhereID($id_turma);
      $professores_turma = getProfessoresTurma($id_turma);
      $professores = getProfessoresNotIn($id_turma);
      dd($professores);
      $alunos_turma = getAlunosTurma($id_turma);
      
      return view('painel/administrativo/editar/turma/turma', compact(['turma_info','alunos_turma','professores_turma','professores']));

    }

    public function salva_turma(Request $req)
    {

    	dd($req->all());
    	$professor = $req->input('professores');

    	foreach ($professor as $professor) { 
        	$input = formataDadosTurmaDisciplina($professor,$formTurma);
        	TurmaDisciplina::find()->update($input);   
      	}

    	//formataDadosTurmaDisciplina()

    }
}
