<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){

	Route::get('/', 'PainelController@index')->name('painel.home');
    
    Route::get('/painel', 'PainelController@index')->name('painel.home');

    Route::get('/cadastrar_turma', function () {
        return view('painel/cadastrar/turma');
    })->name('cadastrar_turma');

    Route::get('/cadastrar_aluno', function () {
        return view('painel/cadastrar/aluno');
    })->name('cadastrar_aluno');

    Route::get('/cadastrar_professor', function () {
        return view('painel/cadastrar/professor');
    })->name('cadastrar_professor');

    Route::get('/relacionar', function () {
        return view('painel/relacionar/index');
    })->name('relacionar');

});

Auth::routes();
