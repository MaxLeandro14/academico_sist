<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aluno;
use App\Professor;

class FinanceiroController extends Controller
{
    //ALUNO
    public function index_financeiro_aluno()
    {
      $alunos = Aluno::all();
      $mostra_footer_header = NULL;
      return view('painel/administrativo/financeiro/aluno/index',compact(['alunos','mostra_footer_header']));
    }

    public function financeiro_aluno($id)
    {
      $aluno = getAlunoWhereID($id);
      $parcelas = DB::table('parcelas')->select('parcelas.*')->where('id_aluno','=',$id)->get();
      return view('painel/administrativo/financeiro/aluno/aluno',compact(['aluno','parcelas']));
    }

    public function mostra_aluno($id_aluno)
    {
      $aluno = getAlunoWhereID($id_aluno);
      $mostra_footer_header = 'sim';
      return view('painel.templates.aluno', compact(['aluno','mostra_footer_header']));
    }

    public function financeiro_aluno_salva(Request $req, $id_parcela, $mes_parcela )
    {

      $debug = updateParcela($req,$id_parcela,$mes_parcela);
      return redirect()->route('financeiro_aluno',$req->input('id_aluno'));
      
    }


    //PROFESSOR
    public function index_financeiro_professor()
    {
      $professores = getProfessores();
      return view('painel/administrativo/financeiro/professor/index',compact('professores'));
    }



    //PROFESSOR
    public function index_minhas_turmas()
    {
      $codigo_professor = auth()->user()->codigo;
      $minhas_turmas = getTurmaDisciplinaWhereID($codigo_professor);
      return view('painel/professor/index',compact('minhas_turmas'));
        
    }

    public function minhas_turmas()
    {
      
      return view('painel/professor/turma');
        
    }

    public function cadastra_parelas(Request $req)
    {

      $dados = $req->all();

      if(!$dados)
      return view('painel/administrativo/matricular/teste_parcelas');

      $alunos = Aluno::all();

      foreach ($alunos as $aluno) {
        
        $dados['id_aluno'] = $aluno->id;
        for ($mes=1; $mes <=12; $mes++) { 
          $dados['mes_parcela'] = $mes;
          $dados['valor_parcela'] = $aluno->valor_matricula;
          Parcela::create($dados);
        }
        
      }
      return redirect()->route('financeiro_aluno');
    }
}
