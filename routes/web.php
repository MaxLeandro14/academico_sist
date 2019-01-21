<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){
    //Home
    Route::get('/', 'PainelController@index')->name('painel.home');
    
    //Turma
    Route::get('cadastrar_turma', 'PainelController@index_cadastrar_turma')->name('cadastrar_turma');
    Route::post('cadastra_turma', 'PainelController@cadastrar_turma')->name('cadastra_turma');
    Route::get('mostra_turma/{id}','PainelController@mostra_turma')->name('mostra_turma');

    //Professor
    Route::get('cadastrar_professor','PainelController@index_cadastrar_professor')->name('cadastrar_professor');
    Route::post('cadastra_professor','PainelController@cadastrar_professor')->name('cadastra_professor');

    //Matricula Aluno em Turma
    Route::get('matricular_aluno','PainelController@index_matricular_aluno')->name('matricular_aluno');
    Route::get('matricular_aluno/{id}', 'PainelController@matricular_aluno')->name('matricula_aluno');
    Route::post('matricular_aluno/{id}', 'PainelController@matricular_aluno')->name('matricula_aluno');

    //Aluno
    Route::get('cadastrar_aluno','PainelController@index_cadastrar_aluno')->name('cadastrar_aluno');
    Route::post('cadastra_aluno','PainelController@cadastrar_aluno')->name('cadastra_aluno');

    Route::get('minhas_turmas', function () {
        return view('painel/professor/index');
    })->name('minhas_turmas');

    Route::get('/turma', function () {
        return view('painel/professor/turma');
    })->name('turma');



});

Auth::routes();
