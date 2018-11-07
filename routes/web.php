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
Route::get('/service', 'TitleController@indexServices')->name('service');
Route::get('/blog', 'TitleController@indexBlog');
Route::get('/contact', 'TitleController@indexContact');
Route::get('/editSite', 'TitleController@edit')->middleware('can:superadmin');
Route::get('/editServices', 'TitleController@editServices')->middleware('can:superadmin');
Route::get('/editBlog', 'TitleController@editBlog')->middleware('can:superadmin');
Route::get('/editContact', 'TitleController@editContact')->middleware('can:superadmin');
Route::post('/updateSite/{id}', 'TitleController@update')->middleware('can:superadmin');
Route::post('/updateServicePage/{id}', 'TitleController@updateService')->middleware('can:superadmin');
Route::post('/updateBlogPage/{id}', 'TitleController@updateBlog')->middleware('can:superadmin');
Route::post('/updateContactPage/{id}', 'TitleController@updateContact')->middleware('can:superadmin');
Route::post('/search', 'TitleController@search');
Route::get('/tag/search', 'TitleController@searchTag');
Route::get('/categorie/search', 'TitleController@searchCategorie');


Route::get('/users', 'UserController@index')->middleware('can:admin');
Route::post('/user/create', 'UserController@store')->middleware('can:superadmin');
Route::get('/user/edit/{id}', 'UserController@edit')->middleware('can:users,id');
Route::post('/user/update/{id}', 'UserController@update')->middleware('can:users,id');
Route::delete('/user/delete/{id}', 'UserController@destroy')->middleware('can:users,id');

Route::get('profil/{id}', 'ProfilController@index')->middleware('can:profil,id');
Route::get('/profil/edit/{id}', 'ProfilController@edit')->middleware('can:profil,id');
Route::post('/profil/update/{id}', 'ProfilController@update')->middleware('can:profil,id');

Route::get('/roles', 'RoleController@index')->middleware('can:superadmin');
Route::post('/roles/create', 'RoleController@store')->middleware('can:superadmin');
Route::delete('/roles/{id}/delete', 'RoleController@destroy')->middleware('can:superadmin');
Route::get('roles/{id}/edit', 'RoleController@edit')->middleware('can:superadmin');
Route::post('/roles/update/{id}', 'RoleController@update')->middleware('can:superadmin');


Route::get('/imagesRandom', 'RandomController@index')->middleware('can:superadmin');
Route::post('imagesRandom/create', 'RandomController@store')->middleware('can:superadmin');
Route::delete('/delete/random/{id}', 'RandomController@destroy')->middleware('can:superadmin');
Auth::routes();


Route::get('/posts', 'PostController@index');
Route::get('/post/{id}', 'TitleController@post');
Route::post('/posts/create', 'PostController@store')->middleware('can:admin');
Route::get('/post/edit/{id}', 'PostController@edit')->middleware('can:post,id');
Route::post('/posts/update/{id}', 'PostController@update')->middleware('can:post,id');
Route::delete('/post/delete/{id}', 'PostController@destroy')->middleware('can:post,id');

Route::get('/comments', 'CommentController@index')->middleware('can:admin');
Route::get('/comment/{id}/edit', 'CommentController@edit')->middleware('can:comments,id');
Route::post('/comment/create/{id}', 'CommentController@create')->middleware('can:admin');
Route::post('/comment/{id}', 'CommentController@update')->middleware('can:comments,id');
Route::delete('/comment/delete/{id}', 'CommentController@destroy')->middleware('can:comments,id');
Route::get('/comment/answer/{id}', 'CommentController@answer')->middleware('can:admin');
Route::post('/comment/answer/create/{id}', 'CommentController@comAnswer')->middleware('can:admin');

Route::get('/categories', 'CategorieController@index')->middleware('can:admin');
Route::post('/categorie/create', 'CategorieController@create')->middleware('can:admin');
Route::get('/categorie/edit/{id}', 'CategorieController@edit')->middleware('can:categories,id');
Route::post('/categorie/update/{id}', 'CategorieController@update')->middleware('can:categories,id');
Route::delete('/categorie/delete/{id}', 'CategorieController@destroy')->middleware('can:categories,id');

Route::get('/tags', 'TagController@index')->middleware('can:admin');
Route::post('/tag/create', 'TagController@create')->middleware('can:admin');
Route::get('/tag/edit/{id}', 'TagController@edit')->middleware('can:tags,id');
Route::post('/tag/update/{id}', 'TagController@update')->middleware('can:tags,id');
Route::delete('/tag/delete/{id}', 'TagController@destroy')->middleware('can:tags,id');


Route::get('/icons', 'IconController@index')->middleware('can:superadmin');
Route::post('/icon/create', 'IconController@create')->middleware('can:superadmin');
Route::get('/icon/edit/{id}', 'IconController@edit')->middleware('can:superadmin');
Route::post('/icon/update/{id}', 'IconController@update')->middleware('can:superadmin');
Route::delete('/icon/delete/{id}', 'IconController@destroy')->middleware('can:superadmin');

Route::get('/projects_creation', 'ProjectController@index')->middleware('can:superadmin');
Route::get('/projects', 'ProjectController@indexDeux')->middleware('can:superadmin');
Route::post('/project/create', 'ProjectController@create')->middleware('can:superadmin');
Route::get('/project/edit/{id}', 'ProjectController@edit')->middleware('can:superadmin');
Route::post('/project/update/{id}', 'ProjectController@update')->middleware('can:superadmin');
Route::post('/project/delete/{id}', 'ProjectController@archive')->middleware('can:superadmin');

Route::get('/services_creation', 'ServiceController@index')->middleware('can:superadmin');
Route::post('/service/create', 'ServiceController@create')->middleware('can:superadmin');
Route::get('/services', 'ServiceController@indexDeux')->middleware('can:superadmin');
Route::get('/service/edit/{id}', 'ServiceController@edit')->middleware('can:superadmin');
Route::post('/service/delete/{id}', 'ServiceController@archive')->middleware('can:superadmin');
Route::post('/service/update/{id}', 'ServiceController@update')->middleware('can:superadmin');

Route::get('/clients', 'ClientController@index')->middleware('can:superadmin');
Route::post('/client/create', 'ClientController@create')->middleware('can:superadmin');
Route::get('/client/edit/{id}', 'ClientController@edit')->middleware('can:superadmin');
Route::post('/client/update/{id}', 'ClientController@update')->middleware('can:superadmin');
Route::delete('/client/delete/{id}', 'ClientController@destroy')->middleware('can:superadmin');

Route::get('/testimonials', 'TestimonialController@index')->middleware('can:superadmin');
Route::post('/testimonial/create', 'TestimonialController@create')->middleware('can:superadmin');
Route::get('/testimonial/edit/{id}', 'TestimonialController@edit')->middleware('can:superadmin');
Route::post('/testimonial/update/{id}', 'TestimonialController@update')->middleware('can:superadmin');
Route::delete('/testimonial/delete/{id}', 'TestimonialController@destroy')->middleware('can:superadmin');

Route::get('/carousels', 'CarouselController@index')->middleware('can:superadmin');
Route::post('/carou/create', 'CarouselController@create')->middleware('can:superadmin');
Route::get('/carou/edit/{id}', 'CarouselController@edit')->middleware('can:superadmin');
Route::post('/carou/update/{id}', 'CarouselController@update')->middleware('can:superadmin');
Route::delete('/carou/delete/{id}', 'CarouselController@destroy')->middleware('can:superadmin');

Route::get('/insta', 'InstagramController@index')->middleware('can:superadmin');
Route::post('/insta/create', 'InstagramController@create')->middleware('can:superadmin');
Route::get('/insta/edit/{id}', 'InstagramController@edit')->middleware('can:superadmin');
Route::post('/insta/update/{id}', 'InstagramController@update')->middleware('can:superadmin');
Route::delete('/insta/delete/{id}', 'InstagramController@destroy')->middleware('can:superadmin');

Route::post('/contact/create', 'ContactController@store');
Route::post('/news/create', 'NewsletterController@store');

Route::get('/home', 'HomeController@index')->name('home');
