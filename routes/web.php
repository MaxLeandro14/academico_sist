<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){
    //Home
    Route::get('/', 'PainelController@index')->name('painel.home');
    
    //Turma
    Route::get('cadastrar_turma', 'PainelController@index_cadastrar_turma')->name('cadastrar_turma');
    Route::post('cadastrar_turma', 'PainelController@cadastrar_turma')->name('cadastra_turma');
    Route::get('cadastrar_turma/{codigo_turma}','PainelController@mostra_turma')->name('mostra_turma');

    //Professor
    Route::get('cadastrar_professor','PainelController@index_cadastrar_professor')->name('cadastrar_professor');
    Route::post('cadastrar_professor','PainelController@cadastrar_professor')->name('cadastra_professor');

    //Matricula
    Route::get('matricular_aluno','PainelController@index_matricular_aluno')->name('matricular_aluno');
    Route::get('matricular_aluno/{codigo_turma}', 'PainelController@matricular_aluno')->name('matricula_aluno');
    Route::post('matricular_aluno/{codigo_turma}', 'PainelController@matricular_aluno')->name('matricula_aluno');

    //Aluno
    Route::get('cadastrar_aluno','PainelController@index_cadastrar_aluno')->name('cadastrar_aluno');
    Route::post('cadastrar_aluno','PainelController@cadastrar_aluno')->name('cadastra_aluno');

    //Minhas Turmas
    Route::get('minhas_turmas','PainelController@index_minhas_turmas')->name('minhas_turmas');
    Route::get('minhas_turmas/{codigo_turma}','PainelController@minhas_turmas')->name('turma');

    //Financeiro - Aluno
    Route::get('financeiro_aluno','PainelController@index_financeiro_aluno')->name('index_financeiro_aluno');
    Route::get('financeiro_aluno/{id_aluno}','PainelController@financeiro_aluno')->name('financeiro_aluno');
    Route::get('financeiro_aluno/{id_aluno}/{nome_aluno}','PainelController@mostra_aluno')->name('mostra_aluno');
    Route::post('financeiro_aluno_salva/{id_parcela}/{mes_parcela}','PainelController@financeiro_aluno_salva')->name('financeiro_aluno_salva');

    //Financeiro - Professor
    Route::get('financeiro_professor','PainelController@index_financeiro_professor')->name('index_financeiro_professor');
    Route::get('financeiro_professor/{id_professor}','PainelController@financeiro_professor')->name('financeiro_professor');

    //Script de Teste // Adiciona Parcela
    Route::get('cadastra_parelas','PainelController@cadastra_parelas')->name('cadastrar_parelas');
    Route::post('cadastra_parelas','PainelController@cadastra_parelas')->name('cadastra_parelas');

    //Gerenciamento - ACL
    Route::resource('usuarios', 'UsuarioController');
    
    Route::get('usuarios/papel/{id}', 'UsuarioController@papel')->name('usuarios.papel');
    Route::post('usuarios/papel/{papel}', 'UsuarioController@papelStore')->name('usuarios.papel.store');
    Route::delete('usuarios/papel/{usuario}/{papel}', 'UsuarioController@papelDestroy')->name('usuarios.papel.destroy');

    Route::resource('papeis', 'PapelController');

    Route::get('papeis/permissao/{id}', 'PapelController@permissoes')->name('papeis.permissao');
    Route::post('papeis/permissao/{permissao}', 'PapelController@permissoesStore')->name('papeis.permissao.store');
    Route::delete('papeis/permissao/{papel}/{permissao}', 'PapelController@permissoesDestroy')->name('papeis.permisoes.destroy');
    
    //Declaração
    Route::get('declaracao', 'AlunoController@listarAlunos');
    Route::get('declaracao/imprimir/{id}', 'PdfController@imprimirDeclaracao')->name('declaracao.imprimir');;


    

});


Route::get('/register', function(){
    return view('auth/register');
})->name('home');

Auth::routes();
