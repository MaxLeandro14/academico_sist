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

class CadastroController extends Controller
{


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
      $formTurma = Turma::create($input);
      
      foreach ($professor_disciplina as $professor_disciplina) { 
        $input = formataDadosTurmaDisciplina($professor_disciplina,$formTurma);
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
      $codigo_professor = geraCodigoProfessor();
      $id_disciplina = $req->input('id_disciplina');
      $formFuncionario = Funcionario::create($dados);
      $dados['codigo_professor'] = $codigo_professor;
      $dados['id_funcionario'] = $formFuncionario->id;
      $formProfessor = Professor::create($dados);      
      //Relaciona professor e disciplina(s)
      foreach ($id_disciplina as $disciplina) {
        $input = formataDadosDisciplinaProfessor($req,$disciplina,$formProfessor);
        DisciplinaProfessor::create($input);        
      }
      return redirect()->route('cadastrar_professor');
    }


    //ALUNO
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
}
