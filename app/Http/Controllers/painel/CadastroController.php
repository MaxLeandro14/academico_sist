<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turma;
use App\TurmaDisciplina;
use App\Professor;
use App\Aluno;
use App\Cargo;
use App\Funcionario;
use App\Disciplina;
use App\DisciplinaProfessor;
use App\DiarioProfessor;
use App\UF;

class CadastroController extends Controller
{


    //TURMA
    public function index_cadastrar_turma()
    {
      //$disciplinas_professores = getDisciplinaProfessor();
      $disciplinas_professores = DisciplinaProfessor::all();
      //dd($disciplinas_professores);
      $turmas = getTodasTurmas();
      return view('painel/administrativo/cadastrar/turma', compact(['disciplinas_professores','turmas']));
    }

    public  function cadastrar_turma(Request $req)
    {
      $codigo_turma = geraCodigoTurma();
      $professor_disciplina = $req->input('professores');
      $input = formataDadosTurma($professor_disciplina,$req,$codigo_turma);
      $formTurma = Turma::create($input);
      
      foreach ($professor_disciplina as $professor_disciplina) { 
        $input = formataDadosTurmaDisciplina($professor_disciplina,$formTurma);
        TurmaDisciplina::create($input);   
      }
      $req->session()->flash('mensagem_sucesso', 'Turma Cadastrada!');
      return redirect()->route('cadastrar_turma');   
    }

    public function mostra_turma($id_turma)
    {
      $turma_info = getTurmaWhereID($id_turma);
      $professores_turma = getProfessoresTurma($id_turma);
      $mostra_footer_header = 'sim';
      $mostra_professores_turma = 'sim';
      return view('painel/templates/turma', compact(['turma_info','mostra_footer_header','mostra_professores_turma','professores_turma']));
    }    



    //PROFESSOR
    public function index_cadastrar_professor()
    {
      $disciplinas = Disciplina::all();
      $cargos = Cargo::all();
      $ufs = UF::all();
      $disciplinas_professores = getDisciplinaProfessor();  
      return view('painel/administrativo/cadastrar/professor', compact(['disciplinas','disciplinas_professores','cargos','ufs']));
    }

    public function cadastrar_professor(Request $req)
    {

      $dados = $req->all();
      $id_disciplina = $req->input('id_disciplina');
      $formFuncionario = Funcionario::create($dados);
      $dados['codigo_professor'] = geraCodigoProfessor();
      $dados['id_funcionario'] = $formFuncionario->id;
      $formProfessor = Professor::create($dados);      
      //Relaciona professor e disciplina(s)
      foreach ($id_disciplina as $disciplina) {
        $input = formataDadosDisciplinaProfessor($req,$disciplina,$formProfessor);
        DisciplinaProfessor::create($input);        
      }
      $req->session()->flash('mensagem_sucesso', 'Professor(a) Cadastrado(a)!');
      return redirect()->route('cadastrar_professor');
    }


    //ALUNO
    public function index_cadastrar_aluno()
    {
      $ufs = UF::all();
      return view('painel/administrativo/cadastrar/aluno',compact(['ufs']));
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
      $req->session()->flash('mensagem_sucesso', 'Aluno(a) Cadastrado(a)!');
      return redirect()->route('cadastrar_aluno');
      
    }
}
