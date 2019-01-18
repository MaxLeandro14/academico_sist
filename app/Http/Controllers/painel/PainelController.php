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


    public function Lista_Disciplina_e_Professor()
    {
    	$disciplinas = Disciplina::all();

      $disciplinas_professores = DB::table('disciplina_professors')
      ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
      ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
      ->select('disciplina_professors.*','disciplinas.nome_disciplina', 'professors.nome_professor')
      ->get();

      return view('painel/administrativo/cadastrar/professor', compact(['disciplinas','disciplinas_professores']));

    }

    public function cadastra_professor(Request $req)
    {

      $id_disciplina = $req->input('id_disciplina');
      foreach ($id_disciplina as $disciplina) {
        
        $input = $req->except('id_disciplina');
        $input['id_disciplina'] = $disciplina;

        dd($input);  
      }
      //$id_disciplina = implode(',', $id_disciplina);

      

      //DisciplinaProfessor::create($input);
      //$form = Professor::create($dados);
      //$dados['id_professor'] = $form->id;
      //DisciplinaProfessor::create($dados);
      //return redirect()->route('cadastrar_professor');

    }

    public function cadastrar_turma()
    {

      $disciplinas_professores = DB::table('disciplina_professors')
      ->join('disciplinas', 'disciplina_professors.id_disciplina', '=', 'disciplinas.id')
      ->join('professors', 'disciplina_professors.id_professor', '=', 'professors.id')
      ->select('disciplina_professors.*','disciplinas.nome_disciplina', 'professors.nome_professor')
      ->get();

    	return view('painel/administrativo/cadastrar/turma', compact('disciplinas_professores'));
    }

}
