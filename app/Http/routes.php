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

Route::get('/', function () {
    return view('material.index');
});

/*
|--------------------------------------------------------------------------
| User Resource
|--------------------------------------------------------------------------
*/
Route::resource('user', 'UserController', ['except'=>['show']]);
Route::post('/user/login', ['as'=>'user.login', 'uses'=>'UserController@login']);

/*
|--------------------------------------------------------------------------
| Teacher Resource
|--------------------------------------------------------------------------
*/
Route::resource('teacher', 'TeacherController', ['except'=>['create','store','show']]);

/*
|--------------------------------------------------------------------------
| College Resource
|--------------------------------------------------------------------------
*/
Route::resource('college', 'CollegeController', ['except'=>['create','store','show']]);

/*
|--------------------------------------------------------------------------
| Course Resource
|--------------------------------------------------------------------------
*/
Route::resource('course', 'CourseController', ['except'=>['create','store','show']]);

/*
|--------------------------------------------------------------------------
| Material Resource
|--------------------------------------------------------------------------
*/
Route::resource('material', 'MaterialController');
Route::post('/upload', ['as'=>'material.upload', 'uses'=>'MaterialController@upload']);
Route::get('/donate', ['as'=>'material.donate', 'uses'=>'MaterialController@donate']);
Route::get('/search', ['as'=>'material.search', 'uses'=>'MaterialController@search']);

/*
|--------------------------------------------------------------------------
| Location Resource
|--------------------------------------------------------------------------
*/
Route::resource('location', 'LocationController');
Route::get('/searchLocation/{busca}', ['as' => 'location.search', 'uses' => 'LocationController@search']);