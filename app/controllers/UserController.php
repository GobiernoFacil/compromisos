<?php

class UserController extends \BaseController {

	public function __construct(){
		 $this->beforeFilter('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  //
	  if(! Auth::user()->is_admin ) return Redirect::to('user/' . Auth::user()->id . '/edit');
	  
	  $users = User::all();
	  return View::make('admin.users')
	  ->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		if(! Auth::user()->is_admin ) return Redirect::to('user/' . Auth::user()->id . '/edit');

		return View::make('admin.users_add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(! Auth::user()->is_admin ) return Redirect::to('user/' . Auth::user()->id . '/edit');

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
		$user->is_admin  = Input::get('is_admin') ? TRUE : FALSE;

		$user->save();

		return Redirect::to('user');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$id = Auth::user()->is_admin ? (int)$id : Auth::user()->id;
		$user = User::find($id);
		return View::make('admin.users_update')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$id = Auth::user()->is_admin ? (int)$id : Auth::user()->id;
		$user = User::find($id);

		$user->username  = Input::get('username');
		$user->name      = Input::get('name');
		$user->phone     = Input::get('phone');
		$user->charge    = Input::get('charge');
		
		if(Auth::user()->is_admin){
			$user->user_type = Input::get('user_type');
		  $user->is_admin  = Input::get('is_admin') ? TRUE : FALSE;
		}

		if( Input::get('password') != ""):
			$user->password  = Hash::make(Input::get('password'));
		endif;

		$user->save();
		return Redirect::to('user');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		if(! Auth::user()->is_admin ) return Redirect::to('user/' . Auth::user()->id . '/edit');

		$user = User::find($id);
		$user->delete();
		return Redirect::to('user');
	}


}
