<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Disciplina;
use App\Professor;
use App\DisciplinaProfessor;
use App\Turma;
use App\TurmaDisciplina;
use App\Aluno;
use App\User;
use App\Parcela;
use App\Cargo;
use App\Funcionario;
use App\TurmaAluno;

class PainelController extends Controller
{
    public function index()
    {
      return view('painel.home.index');
    }



    //TURMA
    public function index_cadastrar_turma()
    {
      $disciplinas_professores = getDisciplinaProfessor();
      $turmas = getTodasTurmas();
      return view('painel/administrativo/cadastrar/turma', compact(['disciplinas_professores','turmas']));
    }

    public  function cadastrar_turma(Request $req)
    {
      $codigo_turma = geraCodigoTurma();
      $professor_disciplina = $req->input('professores');
      $input = formataDadosTurma($professor_disciplina,$req,$codigo_turma);
      //Insere Turma
      $form = Turma::create($input);
      //Insere TurmaDisciplina
      foreach ($professor_disciplina as $professor_disciplina) { 
        $input = formataDadosTurmaDisciplina($professor_disciplina,$form);
        TurmaDisciplina::create($input);   
      }
      return redirect()->route('cadastrar_turma');   
    }

    public function mostra_turma($codigo_turma)
    {
      $turma_info = getTurmaWhereID($codigo_turma);
      $professores_turma = getProfessoresTurma($codigo_turma);
      $mostra_footer_header = 'sim';
      $mostra_professores_turma = 'sim';
      return view('painel/templates/turma', compact(['turma_info','mostra_footer_header','mostra_professores_turma','professores_turma']));
    }    



    //PROFESSOR
    public function index_cadastrar_professor()
    {
      $disciplinas = Disciplina::all();
      $cargos = Cargo::all();
      $disciplinas_professores = getDisciplinaProfessor();  
      return view('painel/administrativo/cadastrar/professor', compact(['disciplinas','disciplinas_professores','cargos']));
    }

    public function cadastrar_professor(Request $req)
    {

      $dados = $req->all();
      //Gera codigo para professor
      $codigo_professor = geraCodigoProfessor();
      //Insere Funcionario
      $id_disciplina = $req->input('id_disciplina');
      $formFuncionario = Funcionario::create($dados);
      //Insere Professor
      $dados['codigo_professor'] = $codigo_professor;
      $dados['id_funcionario'] = $formFuncionario->id;
      $formProfessor = Professor::create($dados);
      
      //Relaciona professor e disciplina(s)
      foreach ($id_disciplina as $disciplina) {
        $input = formataDadosDisciplinaProfessor($req,$disciplina,$formProfessor);
        DisciplinaProfessor::create($input);        
      }
      // retorna pra view anterior
      return redirect()->route('cadastrar_professor');
    }



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
      //dd($professores_turma);
      if(!$dados)
      return view('painel/administrativo/matricular/turma_aluno', compact(['turma_info','todos_alunos','alunos_turma','professores_turma']));

      $id_alunos = $req->input('id_alunos');
      foreach ($id_alunos as $id_aluno) {
        $dados['id_aluno']  = $id_aluno;
        TurmaAluno::create($dados);
      }
      return view('painel/administrativo/matricular/turma_aluno', compact(['turma_info','todos_alunos','alunos_turma','professores_turma']))->with('mensagem_sucesso', 'Aluno(s) Matriculado(s)!');
    }



    //CADASTRA ALUNO
    public function index_cadastrar_aluno()
    {
      return view('painel/administrativo/cadastrar/aluno');
    }

    public function cadastrar_aluno(Request $req)
    {
      $dados = $req->all();
      $dados['codigo_aluno'] = geraCodigoAluno();
      $form = Aluno::create($dados);
      $dados['id_aluno'] = $form->id;
      for ($mes=1; $mes <=12; $mes++) { 
        $dados['mes_parcela'] = $mes;
        Parcela::create($dados);
      }
      
      return redirect()->route('cadastrar_aluno');
      
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



    //FINANCEIRO - Aluno
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

    //FINANCEIRO - Professor
    public function index_financeiro_professor()
    {
      $professores = Professor::all();
      return view('painel/administrativo/financeiro/professor/index',compact('professores'));
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
