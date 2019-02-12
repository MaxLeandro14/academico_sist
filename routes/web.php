<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){
    //Home
    Route::get('/', function(){return view('painel.home.index');});
    
    //CADASTRO - Turma
    Route::get('cadastrar_turma', 'CadastroController@index_cadastrar_turma')->name('cadastrar_turma');
    Route::post('cadastrar_turma', 'CadastroController@cadastrar_turma')->name('cadastra_turma');
    Route::get('cadastrar_turma/{id_turma}','CadastroController@mostra_turma')->name('mostra_turma');

    //CADASTRO - Professor
    Route::get('cadastrar_professor','CadastroController@index_cadastrar_professor')->name('cadastrar_professor');
    Route::post('cadastrar_professor','CadastroController@cadastrar_professor')->name('cadastra_professor');

    //CADASTRO - Aluno
    Route::get('cadastrar_aluno','CadastroController@index_cadastrar_aluno')->name('cadastrar_aluno');
    Route::post('cadastrar_aluno','CadastroController@cadastrar_aluno')->name('cadastra_aluno');

    //MATRICULA
    Route::get('matricular_aluno','MatriculaController@index_matricular_aluno')->name('matricular_aluno');
    Route::get('matricular_aluno/{id_turma}', 'MatriculaController@matricular_aluno')->name('matricula_aluno');
    Route::post('matricular_aluno/{id_turma}', 'MatriculaController@matricular_aluno')->name('matricula_aluno');
    Route::post('matricular_aluno/{id_turma}/{id_aluno}', 'MatriculaController@remove_aluno')->name('remove_aluno');

    //FINANCEIRO - Aluno
    Route::get('financeiro_aluno','FinanceiroController@index_financeiro_aluno')->name('index_financeiro_aluno');
    Route::get('financeiro_aluno/{codigo_aluno}','FinanceiroController@financeiro_aluno')->name('financeiro_aluno');
    Route::get('financeiro_aluno/{codigo_aluno}/{nome_aluno}','FinanceiroController@mostra_aluno')->name('mostra_aluno');
    Route::post('financeiro_aluno_salva/{id_parcela}/{mes_parcela}','FinanceiroController@financeiro_aluno_salva')->name('financeiro_aluno_salva');

    //FINANCEIRO - Professor
    Route::get('financeiro_professor','FinanceiroController@index_financeiro_professor')->name('index_financeiro_professor');
    Route::get('financeiro_professor/{id_professor}','FinanceiroController@financeiro_professor')->name('financeiro_professor');

    //Minhas Turmas
    Route::get('minhas_turmas','MinhasTurmasController@index_minhas_turmas')->name('minhas_turmas');
    Route::get('minhas_turmas/{id_turma}/{id_disciplina}','MinhasTurmasController@minhas_turmas')->name('turma');
    Route::post('minhas_turmas/{id_turma}/{id_disciplina}','MinhasTurmasController@minhas_turmas')->name('muda_bimestre');
    Route::post('salva_notas/{id_turma}/{id_disciplina}','MinhasTurmasController@salva_notas')->name('salva_notas');
    

    //Script de Teste // Adiciona Parcela
    Route::get('cadastra_parcelas','FinanceiroController@cadastra_parelas')->name('cadastrar_parcelas');
    Route::post('cadastra_parcelas','FinanceiroController@cadastra_parelas')->name('cadastra_parcelas');

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
