<?php

class CommitmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  //
	  $commitments = Commitment::all();
	   return View::make('admin.commitments')
	     ->with('commitments', $commitments);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	  //
	  $government_users = User::where('user_type', 'government')->lists('name','id');
	  $society_users = User::where('user_type', 'society')->lists('name','id');
	  return View::make('admin.commitments_add')
	    ->with([
	    	'government_users' => $government_users,
	    	'society_users' => $society_users
	      ]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	  //
	  $Commitment = new Commitment(Input::all());
	  $Commitment->save();
	  return Redirect::to('commitment');
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
	}


}
