<?php

class LoginController extends \BaseController{
	public function __construct(){

	}

	public function getIndex(){
    return View::make('admin.login');
	}

  public function postIndex(){
    if(Auth::attempt(Input::only('username', 'password'))){
      return Redirect::intended('dashboard');
    }
    else{
      return Redirect::back()
        ->withInput()
        ->with('error', "los datos no coinciden");
    }
  }

  public function logout(){
    Auth::logout();
    return Redirect::to('/')
      ->with('message', 'chau :D');
  }

}