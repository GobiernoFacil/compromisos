<?php

// BASE URI: admin/usuarios

class UserController extends BaseController {

	public function __construct(){

	}

	// admin/usuarios (GET)
	// show the users list
	public function getIndex(){
	  $users = User::all();
	  return View::make('admin.users')
	    ->with('users', $users);
	}

	// admin/usuarios/agregar
	// show the new user form
	public function getAgregar(){
		return View::make('admin.users_add');
	}

	// admin/usuarios (POST)
	// save a new user
	public function postIndex(){
		$user = Input::all();
		$user['password'] = Hash::make($user['password']);
		$user['is_admin'] = ! empty($user['is_admin']);
		unset($user['_token']);

		$user = new User;
		$user->username  = Input::get('username');
		$user->password  = Hash::make(Input::get('password'));
		$user->name      = Input::get('name');
		$user->phone     = Input::get('phone');
		$user->charge    = Input::get('charge');
		$user->user_type = Input::get('user_type');
		$user->is_admin  = ! empty(Input::get('is_admin'));

		$user->save();

		return Redirect::to('admin/usuarios');
	}

	// admin/usuarios/editar/{id} (GET)
	// show the update user form
	public function getEditar($id){
		$user = User::find($id);
		return View::make('admin.users_update')->with('user', $user);
	}

	// admin/usuarios (PUT)
	// save an existing user
	public function putIndex($id){
		$user = User::find($id);

		$user->username  = Input::get('username');
		$user->name      = Input::get('name');
		$user->phone     = Input::get('phone');
		$user->charge    = Input::get('charge');
		$user->user_type = Input::get('user_type');
		$user->is_admin  = ! empty(Input::get('is_admin'));
		if( ! empty(Input::get('password'))):
			$user->password  = Hash::make(Input::get('password'));
		endif;

		$user->save();
		return Redirect::to('admin/usuarios');
	}

	// admin/usuarios/{id} (DELETE)
	// 8< - - - - - - KILL A USER -  - - - - - - >8
	public function deleteIndex($id){
		$user = User::find($id);
		$user->delete();
		return Redirect::to('admin/usuarios');
	}

}
