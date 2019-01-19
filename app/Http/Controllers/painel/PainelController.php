<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Disciplina;
use App\Professor;
use App\DisciplinaProfessor;


class PainelController extends Controller
{
    public function index()
    {
      return view('painel.home.index');
    }

    //Cadastro de Turma
    public function index_cadastrar_turma()
    {

      $disciplinas_professores = DB::table('disciplina_professors')
      ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
      ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
      ->select('disciplina_professors.*','disciplinas.nome_disciplina', 'professors.nome_professor','professors.codigo_professor')
      ->get();

      return view('painel/administrativo/cadastrar/turma', compact('disciplinas_professores'));
    }

    public  function cadastrar_turma(Request $req)
    {
      $dados = $req->all();
      dd($dados);
    }    

    //Cadastro de Professor
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
