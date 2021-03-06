<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Aluno;
use App\Parcela;
use App\TurmaAluno;
use App\DiarioProfessor;

class MatriculaController extends Controller
{
    
    //MATRICULA ALUNO EM TURMA
    public function index_matricular_aluno()
    {
      $turmas = getTodasTurmas();
      return view('painel/administrativo/matricular/index', compact('turmas'));
    }

    public function matricular_aluno(Request $req, $id_turma)
    {
      $turma_info = getTurmaWhereID($id_turma);
      $professores_turma = getProfessoresTurma($id_turma);
      $alunos_turma = getAlunosTurma($id_turma);
      $todos_alunos = getAlunos();
      $dados = $req->all();
      
      if(!$dados)
      return view('painel/administrativo/matricular/turma_aluno', compact(['turma_info','todos_alunos','alunos_turma','professores_turma']));

      $id_alunos = $req->input('id_alunos');
      foreach ($id_alunos as $id_aluno) {
        $dados['id_aluno']  = $id_aluno;
        TurmaAluno::create($dados);
        foreach ($professores_turma as $info) {
          $input = formataDadosDiarioProfessor($req,$info);
          $input['id_aluno']  = $id_aluno;
          for ($i=1; $i <= 4; $i++) { 
            $input['nome_bimestre'] = $i;
            DiarioProfessor::create($input);  
          }  
        }
        
      }
      
      $req->session()->flash('mensagem_sucesso', 'Aluno(s) Matriculado(s)!');
      return redirect()->route('matricula_aluno',$turma_info->id);
      
    }

    public function desativa_aluno_turma(Request $req,$id_turma,$id_aluno)
    {
      TurmaAluno::where([['id_turma', $id_turma],['id_aluno',$id_aluno]])->update(['status' => $req->input('status')]);
      return redirect()->route('matricula_aluno',$id_turma);
    
    }

}
