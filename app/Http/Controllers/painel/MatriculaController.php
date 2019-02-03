<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Aluno;
use App\Parcela;
use App\TurmaAluno;

class MatriculaController extends Controller
{
    
    //MATRICULA ALUNO EM TURMA
    public function index_matricular_aluno()
    {
      $turmas = getTodasTurmas();
      return view('painel/administrativo/matricular/index', compact('turmas'));
    }

    public function matricular_aluno(Request $req, $codigo_turma)
    {
      $turma_info = getTurmaWhereID($codigo_turma);
      $professores_turma = getProfessoresTurma($codigo_turma);
      $alunos_turma = getAlunosTurma($codigo_turma);
      $todos_alunos = getAlunos();
      $dados = $req->all();
      
      if(!$dados)
      return view('painel/administrativo/matricular/turma_aluno', compact(['turma_info','todos_alunos','alunos_turma','professores_turma']));

      $id_alunos = $req->input('id_alunos');
      foreach ($id_alunos as $id_aluno) {
        $dados['id_aluno']  = $id_aluno;
        TurmaAluno::create($dados);
      }
      return view('painel/administrativo/matricular/turma_aluno', compact(['turma_info','todos_alunos','alunos_turma','professores_turma']))->with('mensagem_sucesso', 'Aluno(s) Matriculado(s)!');
    }

}
