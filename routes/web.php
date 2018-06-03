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
Route::get('1', function() {     return view('vue1');});
Route::get('article/{n}', 'ArticleController@show')->
where('n', '[0-9]+');

Route::get('facture/{n}','FactureController@show')->
where('n','[0-9]+');

Route::resource('user','UserController');

Route::get('email', 'EmailController@getForm');
Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);


Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]) ;
Route::get('post/{id}', 'PostController@indexTag')->name("showTag");

Route::post('tag/store','PostController@createTag')->name("createTag");

Route::resource('produit', 'ProduitController', ['except' => ['show', 'edit', 'update']]);
Route::get("produit/{n}","ProduitController@cat")->name("categorie");

Route::get('produit/addpanier/{num}',"ProduitController@updatePanier")->name('updatePanier');

Route::get('produit/destroyPanier/{num}',"ProduitController@destroyPanier")->name('destroyPanier');

Route::resource("commentaire","CommentaireController");

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout'); //TODO Regler Problème logout

Route::get('/home', 'postController@index')->name('home');

Route::get('achat', 'AchatController@index');

Route::get('/achats','ProduitUserController@index')->name("confirmAchat");

Route::post('/achats/stock',"ProduitUserController@store")->name("ProduitUser.store");

Route::get('profile', 'UserProfileController@show')->middleware('auth')->name('profile.show');
Route::post('profile', 'UserProfileController@update')->middleware('auth')->name('profile.update');

Route::post('profile/upmail','UserProfileController@update_mail')->name('changeMail');
