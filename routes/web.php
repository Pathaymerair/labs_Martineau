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

Route::get('/', 'TitleController@index');
Route::get('/services', 'TitleController@indexServices');
Route::get('/blog', 'TitleController@indexBlog');
Route::get('/contact', 'TitleController@indexContact');
Route::get('/editSite', 'TitleController@edit');
Route::get('/editServices', 'TitleController@editServices');
Route::get('/editBlog', 'TitleController@editBlog');
Route::get('/editContact', 'TitleController@editContact');
Route::post('/updateSite/{id}', 'TitleController@update');
Route::post('/updateServicePage/{id}', 'TitleController@updateService');
Route::post('/updateBlogPage/{id}', 'TitleController@updateBlog');
Route::post('/updateContactPage/{id}', 'TitleController@updateContact');

Route::get('/users', 'UserController@index');
Route::post('/user/create', 'UserController@store');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/update/{id}', 'UserController@update');
Route::delete('/user/delete/{id}', 'UserController@destroy');
Route::get('/getRandom', 'userController@random');


Route::get('/roles', 'RoleController@index');
Route::post('/roles/create', 'RoleController@store');
Route::delete('/roles/{id}/delete', 'RoleController@destroy');
Route::get('roles/{id}/edit', 'RoleController@edit');
Route::post('/roles/update/{id}', 'RoleController@update');

Route::get('profil/{id}', 'ProfilController@index');
Route::post('/profil/update/{id}', 'ProfilController@update');

Route::get('/imagesRandom', 'RandomController@index');
Route::post('imagesRandom/create', 'RandomController@store');
Route::delete('/delete/random/{id}', 'RandomController@destroy');
Auth::routes();


Route::get('/posts', 'PostController@index');
Route::get('/post/{id}', 'PostController@show');
Route::post('/posts/create', 'PostController@store');
Route::get('/post/edit/{id}', 'PostController@edit');
Route::post('/posts/update/{id}', 'PostController@update');
Route::delete('/post/delete/{id}', 'PostController@destroy');

Route::get('/comments', 'CommentController@index');
Route::get('/comment/{id}/edit', 'CommentController@edit');
Route::post('/comment/create/{id}', 'CommentController@create');
Route::post('/comment/{id}', 'CommentController@update');
Route::delete('/comment/delete/{id}', 'CommentController@destroy')->middleware('can:user');

Route::get('/home', 'HomeController@index')->name('home');
