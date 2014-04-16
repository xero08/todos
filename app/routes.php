<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::post('validate','UserController@dashboard');

Route::get('new',function(){
	return View::make('new');
});

Route::get('welcome',function(){
	return View::make('welcome');
});

Route::post('create','UserController@createAccount');

Route::any('dashboard',function(){	
	if(Session::has('email')){
		$tasks = UserController::getTasks();
		Session::set('tasks',$tasks);
		return View::make('dashboard');
	}
	else
		return Redirect::to('/')->with(array('errorCode' => 1,'message' => 'You must be logged in to view this page'));
});

Route::get('task/{id}',array("uses" => "UserController@viewTask","as" => "ctrlName"))->where('id','[0-9]+');

Route::get('edit/{id}',array("uses" => "UserController@editTask","as" => "ctrlName"))->where('id','[0-9]+');

Route::get('create','UserController@newTask');

Route::post('save','UserController@createTask');

Route::post('save/{id}','UserController@saveTask')->where('id','[0-9]+');

Route::get('logout','UserController@logout');

Route::get('delete/{id}','UserController@deleteTask')->where('id','[0-9]+');

Route::get('complete/{id}','UserController@completeTask')->where('id','[0-9]+');

Route::get('about',function(){
	$msg="Hello World";
	return View::make('about')->with('msgx',$msg);
});