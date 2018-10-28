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
Route::get('/editSite', 'TitleController@edit');
Route::get('/editServices', 'TitleController@editServices');
Route::get('/editBlog', 'TitleController@editBlog');
Route::get('/editContact', 'TitleController@editContact');
Route::post('/updateSite/{id}', 'TitleController@update');
Route::post('/updateServicePage/{id}', 'TitleController@updateService');
Route::post('/updateBlogPage/{id}', 'TitleController@updateBlog');
Route::post('/updateContactPage/{id}', 'TitleController@updateContact');

Route::get('/services', 'TitleController@indexServices');

Route::get('/blog', 'TitleController@indexBlog');

Route::get('/contact', 'TitleController@indexContact');

Route::get('/users', 'UserController@index');
Route::post('/user/create', 'UserController@store');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/update/{id}', 'UserController@update');
Route::delete('/user/delete/{id}', 'UserController@destroy');

Route::get('/roles', 'RoleController@index');
Route::post('/roles/create', 'RoleController@store');
Route::delete('/roles/{id}/delete', 'RoleController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
