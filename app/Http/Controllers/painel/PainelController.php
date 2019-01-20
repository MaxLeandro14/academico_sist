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


class PainelController extends Controller
{
    public function index()
    {
      return view('painel.home.index');
    }

    //TURMA
    public function index_cadastrar_turma()
    {

      $disciplinas_professores = DB::table('disciplina_professors')
      ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
      ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
      ->select('disciplina_professors.*','disciplinas.nome_disciplina', 'professors.nome_professor','professors.codigo_professor')
      ->get();

      $turmas = DB::table('turmas')
      ->select('id','descricao', 'serie','ano','turno','ano_letivo')
      ->get();

      return view('painel/administrativo/cadastrar/turma', compact(['disciplinas_professores','turmas']));
    }

    public  function cadastrar_turma(Request $req)
    {

      $professor_disciplina = $req->input('professores');
      $dados = explode(',', $professor_disciplina[0]);
      
      //Insere Turma
      $input = $req->except('professores');
      $input['id_disciplina_professor'] = $dados[0];
      $input['id_disciplina'] = $dados[1];
      $input['id_professor'] = $dados[2];
      
      $ano_letivo = explode('/',date( 'd/m/Y' , strtotime($input['data_inicial'])));
      $ano_letivo = $ano_letivo[2];
      $input['ano_letivo'] = $ano_letivo;
      $form = Turma::create($input);

      //Insere TurmaDisciplina
      foreach ($professor_disciplina as $professor_disciplina) {
        
        $dados = explode(',', $professor_disciplina);
        $input['id_disciplina_professor'] = $dados[0];
        $input['id_disciplina'] = $dados[1];
        $input['id_professor'] = $dados[2];  
        $input['id_turma'] = $form->id;
        TurmaDisciplina::create($input);
        
      }

      return redirect()->route('cadastrar_turma');
      
    }

    public function mostra_turma($id)
    {

      $turma_info = DB::table('turma_disciplinas')
      ->join('turmas', 'turma_disciplinas.id_turma', '=', 'turmas.id')
      ->join('disciplina_professors', 'turma_disciplinas.id_disciplina_professor', '=', 'disciplina_professors.id')
      ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
      ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
      ->select('turmas.*','professors.*','disciplinas.*')->where('turmas.id', '=', $id)
      ->get();

      return view('painel/administrativo/visualisar/turma', compact('turma_info'));
    }    

    //PROFESSOR
    public function index_cadastrar_professor()
    {
      $disciplinas = Disciplina::all();

      $disciplinas_professores = DB::table('disciplina_professors')
      ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
      ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
      ->select('disciplina_professors.*','disciplinas.nome_disciplina', 'professors.nome_professor','professors.codigo_professor')
      ->get();
      //dd($disciplinas_professores);
      return view('painel/administrativo/cadastrar/professor', compact(['disciplinas','disciplinas_professores']));

    }

    public function cadastrar_professor(Request $req)
    {

      //Gera codigo para professor
      $codigo_professor = strtoupper(bin2hex(random_bytes(2)));
      while (DB::table('professors')->where('codigo_professor', '=', $codigo_professor)->count() > 0) {
        $codigo_professor = strtoupper(bin2hex(random_bytes(2)));
      }
      
      //Insere professor
      $id_disciplina = $req->input('id_disciplina');
      $input = $req->except('id_disciplina');
      $input['id_disciplina'] = $id_disciplina[0];
      $input['codigo_professor'] = $codigo_professor;
      $form = Professor::create($input);
      
      //Relaciona professor e disciplina(s)
      foreach ($id_disciplina as $disciplina) {
        
        $input = $req->except('id_disciplina');
        $input['id_disciplina'] = $disciplina;
        $input['id_professor'] = $form->id;
        DisciplinaProfessor::create($input);
        
      }
      // retorna pra view anterior
      return redirect()->route('cadastrar_professor');
    }




}
