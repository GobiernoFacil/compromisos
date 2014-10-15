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

// PROJECTS
Route::get('project/{id}', 'CommitmentFrontController@project');


// THE BOARD
Route::get('about', function(){
  	   return View::make('compromisos.about');
});

// THE LOGIN
Route::controller('login', 'LoginController');

// * logout
Route::get('logout', 'LoginController@logout');

// THE DASHBOARD SECTION
Route::resource('dashboard', 'DashboardController');

// THE USER LOGIC
// 
Route::resource('user', 'UserController');

// THE COMMITMENT LOGIC
//
Route::resource('commitment', 'CommitmentController');

// THE OBJECTIVE LOGIC
//
Route::resource('objective', 'ObjectiveController');
Route::get('objective/conclude/{id}', 'ObjectiveController@conclude');

// the 404 response x____x
App::missing(function($exception){
  return Response::make("Page not found", 404);
});
