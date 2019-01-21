<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){
    //Home
    Route::get('/', 'PainelController@index')->name('painel.home');
    
    //Turma
    Route::get('cadastrar_turma', ['as'=> 'cadastrar_turma', 'uses'=>'PainelController@index_cadastrar_turma']);
    Route::post('cadastra_turma', ['as'=> 'cadastra_turma', 'uses'=>'PainelController@cadastrar_turma']);
    Route::get('mostra_turma/{id}', ['as'=> 'mostra_turma', 'uses'=>'PainelController@mostra_turma']);

    //Professor
    Route::get('cadastrar_professor', ['as'=> 'cadastrar_professor', 'uses'=>'PainelController@index_cadastrar_professor']);
    Route::post('cadastra_professor', ['as'=> 'cadastra_professor', 'uses'=>'PainelController@cadastrar_professor']);

    //Matricula Aluno em Turma
    Route::get('/matricular_aluno', ['as'=> 'matricular_aluno', 'uses'=>'PainelController@index_matricular_aluno']);
    Route::get('matricular_aluno/{id}', ['as'=> 'matricula_aluno', 'uses'=>'PainelController@matricular']);
    Route::post('matricular_aluno/{id}', ['as'=> 'matricula_aluno', 'uses'=>'PainelController@matricular']);

    Route::get('/cadastrar_aluno', function () {
        return view('painel/administrativo/cadastrar/aluno');
    })->name('cadastrar_aluno');

    Route::get('/minhas_turmas', function () {
        return view('painel/professor/index');
    })->name('minhas_turmas');

    Route::get('/turma', function () {
        return view('painel/professor/turma');
    })->name('turma');



});

Auth::routes();
