<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Aluno;
use App\Professor;
use App\Parcela;

class FinanceiroController extends Controller
{
    //ALUNO
    public function index_financeiro_aluno()
    {
      $alunos = Aluno::all();
      return view('painel/administrativo/financeiro/aluno/index',compact('alunos'));
    }

    public function financeiro_aluno($id_aluno)
    {
      $aluno = Aluno::find($id_aluno);
      return view('painel/administrativo/financeiro/aluno/aluno',compact(['aluno']));
    }

    public function mostra_aluno($id_aluno)
    {
      $aluno = Aluno::find($id_aluno);
      $mostra_footer_header = 'sim';
      return view('painel.templates.aluno', compact(['aluno','mostra_footer_header']));
    }

    public function financeiro_aluno_salva(Request $req, $id_parcela, $mes_parcela )
    {

      updateParcela($req,$id_parcela,$mes_parcela);
      return redirect()->route('financeiro_aluno',$req->input('id_aluno'));
      
    }


    //PROFESSOR
    public function index_financeiro_professor()
    {
      $professores = getProfessores();
      return view('painel/administrativo/financeiro/professor/index',compact('professores'));
    }

    public function financeiro_professor($codigo_professor)
    {
      $professor = getProfessorWhereCodigo($codigo_professor);
      $parcelas = DB::table('parcelas')->select('parcelas.*')->where('id_aluno','=',$id)->get();
      return view('painel/administrativo/financeiro/aluno/aluno',compact(['aluno','parcelas']));
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
      return redirect()->route('index_financeiro_aluno');
    }
}
