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
      return redirect()->route('cadastrar_turma')->with('message', 'Turma Inserida!');   
    }

    public function mostra_turma($codigo_turma)
    {
      $turma_info = getTurmaWhereID($codigo_turma);
      return view('painel/administrativo/visualisar/turma', compact('turma_info'));
    }    



    //PROFESSOR
    public function index_cadastrar_professor()
    {
      $disciplinas = Disciplina::all();
      $disciplinas_professores = getDisciplinaProfessor();  
      return view('painel/administrativo/cadastrar/professor', compact(['disciplinas','disciplinas_professores']));
    }

    public function cadastrar_professor(Request $req)
    {
      //Gera codigo para professor
      $codigo_professor = geraCodigoProfessor();
      //Insere professor
      $id_disciplina = $req->input('id_disciplina');
      $input = formataDadosProfessor($req,$id_disciplina,$codigo_professor);
      $form = Professor::create($input);
      
      //Relaciona professor e disciplina(s)
      foreach ($id_disciplina as $disciplina) {
        $input = formataDadosDisciplinaProfessor($req,$disciplina,$form);
        DisciplinaProfessor::create($input);        
      }
      // retorna pra view anterior
      return redirect()->route('cadastrar_professor')->with('message', 'Professor Inserido!');
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
      $todos_alunos = Aluno::all();
      $alunos_turma = getAlunoWhereID($codigo_turma);
      $dados = $req->all();

      if(!$dados)
      return view('painel/administrativo/matricular/turma_aluno', compact(['turma_info','todos_alunos','alunos_turma']));

      $id_alunos = $req->input('id_alunos');
      foreach ($id_alunos as $id_aluno) {
        $dados['id_aluno']  = $id_aluno;
        print_r($dados); 
        TurmaAluno::create($dados);
      }

    }



    //CADASTRA ALUNO
    public function index_cadastrar_aluno()
    {
      return view('painel/administrativo/cadastrar/aluno');
    }

    public function cadastrar_aluno(Request $req)
    {
      $dados = $req->all();
      //dd($dados);
      $form = Aluno::create($dados);
      $dados['id_aluno'] = $form->id;
      for ($mes=1; $mes <=12; $mes++) { 
        $dados['mes_parcela'] = $mes;
        Parcela::create($dados);
      }
      
      return redirect()->route('cadastrar_aluno')->with('message', 'Professor Inserido!');
      
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



    //FINANCEIRO
    public function index_financeiro_aluno()
    {
      $alunos = Aluno::all();
      return view('painel/administrativo/financeiro/aluno',compact('alunos'));
    }

    public function index_financeiro_professor()
    {
      $professores = Professor::all();
      return view('painel/administrativo/financeiro/professor',compact('professores'));
    }


}
