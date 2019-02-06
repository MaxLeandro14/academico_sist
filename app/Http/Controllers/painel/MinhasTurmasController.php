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
    
    public function minhas_turmas(Request $req,$codigo_turma,$id_disciplina)
    {
      $turma_info = getTurmaWhereID($codigo_turma);
      $bimestre_sessao = (session('bimestre_selecionado')) ? session('bimestre_selecionado') : 1 ; 
      $bimestre = ($req->input('bimestre')) ? $req->input('bimestre') : $bimestre_sessao ;
      $alunos_turma = getAlunosTurma($codigo_turma);
      $notas_alunos = getNotaAlunos($codigo_turma,$bimestre,$id_disciplina);
      $codigo_alunos = getCodigoAlunos($codigo_turma,$bimestre,$id_disciplina);
      $bimestres = array (1, 2, 3, 4);

      $bimestre_selecionado = (isset($notas_alunos->items)) ? $notas_alunos[0]->nome_bimestre : $bimestre ;
      $req->session()->flash('bimestre_selecionado', $bimestre_selecionado);
      return view('painel/professor/turma',compact(['turma_info','alunos_turma','notas_alunos','bimestres','codigo_alunos']));
        
    }

    public function salva_notas(Request $req, $codigo_turma, $id_disciplina){

      $bimestre = $req->input('bimestre');
      $codigo_alunos = getCodigoAlunos($codigo_turma,$bimestre,$id_disciplina);
      $dados = $req->all();
      $notas_alunos = array();
      $nome_campo = 'avaliacao_etapa1,';
      foreach ($dados as $notas) {
        foreach ($codigo_alunos as $aluno) {
        echo($dados[$nome_campo.$aluno->codigo_aluno]); 
        }
      }
      
      dd($dados);
      
    }

}
