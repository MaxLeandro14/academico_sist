<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){
    Route::get('/painel', 'PainelController@index')->name('painel.home');
});
Route::get('/', 'Site\SiteController@index');

Auth::routes();
