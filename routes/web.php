<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', 'BankController@index');
    Route::resource('/admin/kategoris','KategoriController');
    Route::resource('/admin/films','FilmController');
    Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'FilmController@autocomplete'));
    Route::resource('/admin/users','UserController');
    Route::get('/tampil/{id}', 'UserController@tampil')->name('tampil');
    Route::get('/admin/logs', 'LogController@index')->name('logs');
    Route::get('/export', 'LogController@export')->name('export');
    Route::get('/kexport', 'BankController@export')->name('kexport');
    
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/user', function () {
        return view('user.index');
    });
    Route::resource('bioskops','BioskopController');
    Route::resource('penontons','PenontonController');
    Route::resource('banks','BankController');
    Route::put('penontons/{id}', 'PenontonController@kirim')->name('kirim');
    Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'FilmController@autocomplete'));
    Route::get('autofilm',array('as'=>'autofilm','uses'=>'PenontonController@autofilm'));
    Route::get('getkat',array('as'=>'getkat','uses'=>'PenontonController@getkat'));
    Route::get('getkat/{QUERY}','PenontonController@getkat')->name('getk');
    Route::get('/cari','PenontonController@loadData');
    Route::get('search/autocomplete', 'PenontonController@autocomplete');

});
