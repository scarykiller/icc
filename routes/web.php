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

Route::get('/', 'WelcomeController@index');
Route::get('1', function() {     return view('vue1');
 });
Route::get('article/{n}', 'ArticleController@show')->
where('n', '[0-9]+');

Route::get('facture/{n}','FactureController@show')->
where('n','[0-9]+');


Route::resource('user','UserController');

Route::get('email', 'EmailController@getForm');
Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);

Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


