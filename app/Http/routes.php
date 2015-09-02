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

Route::resource('home', 'HomeController', ['except' => ['show', 'edit', 'update', 'destroy']]);
Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
Route::get('/donate', ['as' => 'home.donate', 'uses'=>'HomeController@donate']);
Route::post('/login', ['as' => 'home.login', 'uses'=>'HomeController@login']);

Route::group(['middleware'=>'auth'], function(){
	/*
	|--------------------------------------------------------------------------
	| User Resource
	|--------------------------------------------------------------------------
	*/
	Route::resource('user', 'UserController', ['except'=>['create', 'store']]);
	Route::get('/logout', ['as'=>'user.logout', 'uses'=>'UserController@logout']);
	Route::get('/profile', ['as'=>'user.profile', 'uses'=>'UserController@profile']);
	Route::put('/profile/{id}', ['as'=>'user.updateProfile', 'uses'=>'UserController@updateProfile']);
	Route::get('/searchUser/{search}', ['uses'=>'UserController@search']);
	Route::get('/searchUserName/{search}', ['uses'=>'UserController@searchName']);

	/*
	|--------------------------------------------------------------------------
	| Subject Resource
	|--------------------------------------------------------------------------
	*/
	Route::resource('subject', 'SubjectController', ['only'=>['index']]);
	Route::get('subject/{id}', ['uses' => 'SubjectController@index']);
	Route::get('/searchSubject/{id}/{search}', ['uses'=>'SubjectController@search']);

	/*
	|--------------------------------------------------------------------------
	| College Resource
	|--------------------------------------------------------------------------
	*/
	Route::resource('college', 'CollegeController', ['except'=>['show']]);
	Route::get('/searchCollege/{search}', ['uses'=>'CollegeController@search']);

	/*
	|--------------------------------------------------------------------------
	| Material Resource
	|--------------------------------------------------------------------------
	*/
	Route::resource('material', 'MaterialController', ['except' => ['show']]);
	Route::get('/material/{id}', ['uses' => 'MaterialController@index']);
	Route::get('/filter', ['as'=>'material.filter', 'uses'=>'MaterialController@filter']);
	Route::post('/updateFiltered/{id}', ['as'=>'material.updateFiltered', 'uses'=>'MaterialController@updateFiltered']);
	Route::get('/searchMaterial/{id}/{search}', ['uses'=>'MaterialController@search']);

	/*
	|--------------------------------------------------------------------------
	| Course Resource
	|--------------------------------------------------------------------------
	*/
	Route::resource('course', 'CourseController', ['only'=>['index']]);
	Route::get('/course/{id}', ['uses' => 'CourseController@index']);
	Route::get('/searchCourse/{id}/{search}', ['uses'=>'CourseController@search']);

	/*
	|--------------------------------------------------------------------------
	| Location Resource
	|--------------------------------------------------------------------------
	*/
	Route::get('/searchLocation/{busca}', ['uses' => 'LocationController@search']);
});