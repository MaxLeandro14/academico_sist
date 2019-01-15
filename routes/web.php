<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){

	Route::get('/', 'PainelController@index')->name('painel.home');
    
    Route::get('/painel', 'PainelController@index')->name('painel.home');

    Route::get('/cadastrar_turma', function () {
        return view('painel/administrativo/cadastrar/turma');
    })->name('cadastrar_turma');

    Route::get('/cadastrar_aluno', function () {
        return view('painel/administrativo/cadastrar/aluno');
    })->name('cadastrar_aluno');

    Route::get('/cadastrar_professor', function () {
        return view('painel/administrativo/cadastrar/professor');
    })->name('cadastrar_professor');

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
