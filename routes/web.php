<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){
    Route::get('/painel', 'PainelController@index')->name('painel.home');
});
Route::get('/', 'HomeController@index');

Route::get('/cadastrar_turma', function () {
    return view('painel/cadastrar/turma');
})->name('cadastrar_turma');

Route::get('/cadastrar_aluno', function () {
    return view('painel/cadastrar/aluno');
})->name('cadastrar_aluno');

Auth::routes();
