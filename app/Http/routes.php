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
    return view('subject.home');
});

/*
|--------------------------------------------------------------------------
| Subject Resource
|--------------------------------------------------------------------------
*/
Route::resource('subject', 'SubjectController', ['except'=>['create']]);
Route::get('/subject/home', ['as'=>'subject.home', 'uses'=>'SubjectController@home']);
Route::get('/subject/filter', ['as'=>'subject.filter', 'uses'=>'SubjectController@filter']);
Route::get('/subject/search/{search}', ['as'=>'subject.search', 'uses'=>'SubjectController@search']);

/*
|--------------------------------------------------------------------------
| User Resource
|--------------------------------------------------------------------------
*/
Route::resource('user', 'UserController', ['except'=>['create', 'store', 'show']]);
Route::post('/user/login', ['as'=>'user.login', 'uses'=>'UserController@login']);
Route::post('/user/donate', ['as'=>'user.donate', 'uses'=>'UserController@donate']);

/*
|--------------------------------------------------------------------------
| College Resource
|--------------------------------------------------------------------------
*/
Route::resource('college', 'CollegeController', ['except'=>['show']]);
Route::get('/college/search/{search}', ['as'=>'college.search', 'uses'=>'CollegeController@search']);

/*
|--------------------------------------------------------------------------
| Course Resource
|--------------------------------------------------------------------------
*/
Route::resource('course', 'CourseController', ['only'=>['index']]);
Route::get('/course/search/{search}', ['as'=>'course.search', 'uses'=>'CourseController@search']);

/*
|--------------------------------------------------------------------------
| Upload Resource
|--------------------------------------------------------------------------
*/
Route::resource('upload', 'UploadController', ['only'=>['create', 'store']]);

/*
|--------------------------------------------------------------------------
| Location Resource
|--------------------------------------------------------------------------
*/
Route::resource('location', 'LocationController');
Route::get('/searchLocation/{busca}', ['as' => 'location.search', 'uses' => 'LocationController@search']);