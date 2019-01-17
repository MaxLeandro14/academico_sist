<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Disciplina;
use App\Professor;
use App\DisciplinaProfessor;

class PainelController extends Controller
{
    public function index()
    {
        return view('painel.home.index');
    }


    public function listaDisciplinas()
    {
    	$disciplinas = Disciplina::all();
    	return view('painel/administrativo/cadastrar/professor', compact('disciplinas'));
    }

    public function cadastra_professor(Request $req)
    {

      $dados = $req->all();
      //dd($dados);
      $form = Professor::create($dados);
      $dados['id_professor'] = $form->id;
      DisciplinaProfessor::create($dados);
      return redirect()->route('cadastrar_professor');

    }

    public function cadastrar_turma()
    {

    	$professores = Professor::all();
    	return view('painel/administrativo/cadastrar/turma', compact('professores'));
    }

}
