<?php

class DashboardController extends \BaseController {

	/**
	 * Display dashboard with a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  //
	  $commitments = Commitment::all();
	  $users = User::all();
	   return View::make('admin.dashboard')
	     ->with('commitments', $commitments)
	     ->with('users', $users);
	}
}