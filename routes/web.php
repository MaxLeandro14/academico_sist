<?php
$this->group(['middleware'=> ['auth'], 'namespace'=>'Painel'], function(){
    Route::get('/painel', 'PainelController@index')->name('painel.home');
});
Route::get('/', 'Site\SiteController@index');

Auth::routes();

<<<<<<< HEAD
=======
Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> a561e4c2e141e5831c65d20858ea165b99d67c3d
