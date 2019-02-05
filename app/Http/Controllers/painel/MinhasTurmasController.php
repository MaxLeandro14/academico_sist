<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MinhasTurmasController extends Controller
{
    //MINHAS TURMAS
    public function index_minhas_turmas()
    {
      $codigo_professor = '5EF9';//auth()->user()->codigo;
      $minhas_turmas = getTurmaDisciplinaWhereID($codigo_professor);
      return view('painel/professor/index',compact('minhas_turmas'));
        
    }
    
    public function minhas_turmas(Request $req,$codigo_turma)
    {
      $turma_info = getTurmaWhereID($codigo_turma);
      $bimestre = ($req->input('bimestre')) ? $req->input('bimestre') : 1 ;
      $alunos_turma = getAlunosTurma($codigo_turma);
      $notas_alunos = getNotaAlunos($codigo_turma,$bimestre);
      
      //dd($alunos_turma);
      //dd($notas_alunos);

      return view('painel/professor/turma',compact(['turma_info','alunos_turma','notas_alunos']))->with('codigo_turma',$turma_info->codigo_turma);
        
    }
}
