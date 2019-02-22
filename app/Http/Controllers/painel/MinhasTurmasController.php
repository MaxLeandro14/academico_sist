<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MinhasTurmasController extends Controller
{
    //MINHAS TURMAS
    public function index_minhas_turmas()
    {
      $codigo_professor = '897E';//auth()->user()->codigo;
      $minhas_turmas = getTurmaDisciplinaWhereID($codigo_professor);
      return view('painel/professor/index',compact('minhas_turmas'));
        
    }
    
    public function minhas_turmas(Request $req,$id_turma,$id_disciplina)
    {
      $turma_info = getTurmaWhereID($id_turma);
      $bimestre_sessao = (session('bimestre_selecionado')) ? session('bimestre_selecionado') : 1 ; 
      $bimestre = ($req->input('bimestre')) ? $req->input('bimestre') : $bimestre_sessao ;
      $alunos_turma = getAlunosTurma($id_turma);
      $notas_alunos = getNotaAlunos($id_turma,$bimestre,$id_disciplina);
      $bimestres = array (1, 2, 3, 4);

      $bimestre_selecionado = (isset($notas_alunos->items)) ? $notas_alunos[0]->nome_bimestre : $bimestre ;
      $req->session()->flash('bimestre_selecionado', $bimestre_selecionado);
      return view('painel/professor/turma',compact(['turma_info','alunos_turma','notas_alunos','bimestres']));
        
    }

    public function salva_notas(Request $req, $id_turma, $id_disciplina){

      $bimestre = $req->input('bimestre');
      $id_alunos = getIdAlunos($id_turma,$bimestre,$id_disciplina);
      $dados = $req->all();
      
      $notas = formataNotas($id_alunos,$dados);
      
      updateNotas($id_alunos,$notas,$bimestre);
      
      return redirect()->route('turma', ['id_turma' => $id_turma,'id_disciplina' => $id_disciplina]);
    }

}
