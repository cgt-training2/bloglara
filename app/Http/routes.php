<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	// Route::get('/admin', function(){

	// 	return view('admin.login');
	// });
	
	Route::get('/admin','Adminauth\AuthController@showLoginForm');
	Route::post('admin/login', 'Adminauth\AuthController@postLogin');	

	// Route::group(['before' => 'admin', 'after' => 'no-cache'], function(){
	Route::group(['middleware' => ['admin']], function () {

		Route::get('/dashboard','Admin\AdminController@dashboard');
		Route::get('admin/logout','Adminauth\AuthController@logout');

	});
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::group(['middleware' => ['web']], function () {
	
	Route::get('/blog/{slug}',['as' => 'blogs.single', 'uses'=> 
		'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');

	// Authentication Routes
	Route::get('auth/login', ['as'=>'login', 'uses'=>'Auth\AuthController@getLogin']);

	Route::post('auth/login', 'Auth\AuthController@postLogin');
	
	Route::get('auth/logout', ['as'=>'logout', 'uses'=>'Auth\AuthController@getLogout']);

	// Password Reset Routes
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');

	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');

	Route::post('password/reset', 'Auth\PasswordController@reset');


	// Registration Routes
	Route::get('auth/register', ['as'=>'register', 'uses'=>'Auth\AuthController@getRegister']);

	Route::post('auth/register', 'Auth\AuthController@postRegister');

	Route::get('blog', 'BlogController@getIndex');

	Route::get('/', 'PagesController@getIndex');// return view('welcome'););

	Route::get('about', 'PagesController@getAbout');

	Route::get('contact','PagesController@getContact');

	Route::post('contact', 'PagesController@postContact');

	Route::resource('posts','PostsController');

	Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);

	Route::get('comments/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);

	Route::put('comments/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);

	Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);

	Route::get('comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);

	Route::resource('categories','CategoryController');

	Route::resource('tags','TagController');
// });	

