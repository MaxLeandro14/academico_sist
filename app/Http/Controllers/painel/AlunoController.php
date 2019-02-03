<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aluno;

class AlunoController extends Controller
{
    public function listarAlunos()
    {	
    	//fazer somente alunos ativos
    	$todos_alunos = Aluno::all();

    	return view('painel.documentos.declaracao_vinculo', compact('todos_alunos'));
    }
}
