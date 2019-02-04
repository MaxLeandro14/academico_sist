<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MinhasTurmasController extends Controller
{
    //MINHAS TURMAS
    public function index_minhas_turmas()
    {
      $codigo_professor = '0C3F';//auth()->user()->codigo;
      $minhas_turmas = getTurmaDisciplinaWhereID($codigo_professor);
      return view('painel/professor/index',compact('minhas_turmas'));
        
    }
    
    public function minhas_turmas()
    {
      
      return view('painel/professor/turma');
        
    }
}
