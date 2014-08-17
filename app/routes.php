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

// THE LANDING PAGE
Route::resource('/', 'CommitmentFrontController');
// THE BOARD
Route::get('compromisos', function(){
  return 'aquí irán los compromisos';
});

// THE LOGIN
Route::controller('login', 'LoginController');

// * logout
Route::get('logout', 'LoginController@logout');

// THE USER LOGIC
// 
Route::resource('user', 'UserController');

// THE COMMITMENT LOGIC
//
Route::resource('commitment', 'CommitmentController');

// THE OBJECTIVE LOGIC
//
Route::resource('objective', 'ObjectiveController');

// the 404 response x____x
App::missing(function($exception){
  return Response::make("Page not found", 404);
});
