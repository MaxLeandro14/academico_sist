<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){

    Route::get('/', 'PainelController@index')->name('painel.home');
    
    //Cadastrar Turma
    Route::get('cadastrar_turma', ['as'=> 'cadastrar_turma', 'uses'=>'PainelController@index_cadastrar_turma']);
    Route::post('cadastra_turma', ['as'=> 'cadastra_turma', 'uses'=>'PainelController@cadastrar_turma']);
    Route::get('mostra_turma/{id}', ['as'=> 'mostra_turma', 'uses'=>'PainelController@mostra_turma']);

    //Cadastrar Professor
    Route::get('cadastrar_professor', ['as'=> 'cadastrar_professor', 'uses'=>'PainelController@index_cadastrar_professor']);
    Route::post('cadastra_professor', ['as'=> 'cadastra_professor', 'uses'=>'PainelController@cadastrar_professor']);


    Route::get('/cadastrar_aluno', function () {
        return view('painel/administrativo/cadastrar/aluno');
    })->name('cadastrar_aluno');

    
    
    Route::get('/relacionar', function () {
        return view('painel/administrativo/relacionar/index');
    })->name('relacionar');

    Route::get('/minhas_turmas', function () {
        return view('painel/professor/index');
    })->name('minhas_turmas');

    Route::get('/turma', function () {
        return view('painel/professor/turma');
    })->name('turma');



});

Auth::routes();
