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
Route::get('/', function()
{
  return 'howdy!';
});

// THE BOARD
Route::get('compromisos', function(){
  return 'aquí irán los compromisos';
});

// THE LOGIN PAGE
// * login form
Route::get('login', function(){
  return View::make('admin.login');
});
// * user validation
Route::post('login', function(){
  if(Auth::attempt(Input::only('username', 'password'))){
    return Redirect::intended('admin');
  }
  else{
    return Redirect::back()
      ->withInput()
      ->with('error', "los datos no coinciden");
  }
});

// * logout
Route::get('logout', function(){
  Auth::logout();
  return Redirect::to('/')
    ->with('message', 'chau :D');
});

// THE ADMIN SECTION
// * menu: users, commitments, logout
Route::get('admin', function(){
  return View::make('admin.admin');
});

// THE USER LOGIC
// 
Route::resource('user', 'UserController');

// THE COMMITMENT LOGIN
//
Route::resource('commitment', 'CommitmentController');


// * commitments list
Route::get('admin/compromisos', function(){
  $commitments = Commitment::all();
  return View::make('admin.commitments')
    ->with('commitments', $commitments);
});

// * add commitment
Route::get('admin/compromisos/agregar', function(){
  return "aquí va el formulario para agregar compromiso";
});

// * add step
Route::get('admin/avance/agregar', function(){
  return "aquí va el formulario para agregar un avance";
});

// * add event
Route::get('admin/evento/agregar', function(){
  return "aquí va el formulario para agregar un evento";
});

// * save new commitment
Route::post('admin/compromisos', function(){
  return "aquí va lo de salvar un nuevo compromiso";
});

// * save new step
Route::post('admin/avance', function(){
  return "aquí va lo de salvar un nuevo avance";
});

// * save new event
Route::post('admin/evento', function(){
  return "aquí va lo de salvar un nuevo evento";
});

// * update commitment form
Route::get('admin/compromiso/{id}', function($id){
  return "aquí va el formulario para editar un compromiso existente";
})->where('id', '[1-9]+');

// * update step form
Route::get('admin/avance/{id}', function($id){
  return "aquí va el formulario para editar un avance existente";
})->where('id', '[1-9]+');

// * update event form
Route::get('admin/evento/{id}', function($id){
  return "aquí va el formulario para editar un evento existente";
})->where('id', '[1-9]+');

// * update commitment
Route::put('admin/compromiso/{id}', function($id){
  return "aquí se actualiza un compromiso";
})->where('id', '[1-9]+');

// * update step
Route::put('admin/avance/{id}', function($id){
  return "aquí se actualiza un avance";
})->where('id', '[1-9]+');

// * update event
Route::put('admin/evento/{id}', function($id){
  return "aquí se actualiza un evento";
})->where('id', '[1-9]+');

// * delete commitment
Route::delete('admin/compromiso/{id}', function($id){
  return "aquí se le da matarili a un compromiso";
})->where('id', '[1-9]+');

// * delete step
Route::delete('admin/avance/{id}', function($id){
  return "aquí se le da matarili a un avance";
})->where('id', '[1-9]+');

// * delete event
Route::delete('admin/evento/{id}', function($id){
  return "aquí se le da matarili a un evento";
})->where('id', '[1-9]+');

// the 404 response x____x
App::missing(function($exception){
  return Response::make("Page not found", 404);
});
