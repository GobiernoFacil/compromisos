<?php

class CommitmentController extends \BaseController {
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
	  $commitments = Commitment::leftjoin('users AS u1', 'u1.id', '=', 'commitments.government_user')
      ->leftjoin('users AS u2', 'u2.id', '=', 'commitments.society_user')
	    ->select(
	    	'commitments.id',
	    	'commitments.title', 
	    	'commitments.plan', 
	    	'u1.name AS government_user',
	    	'u2.name AS society_user')
	    ->with('steps')
	    ->get();
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

	  // CREATE THE FOUR STEPS
	  $steps = [];
	  for($i = 1; $i <= 4; $i++ ){
	  	$step = new Step([
	  		'commitment_id' => $Commitment->id,
	  		'ends' => date('Y-m-d'),
	  		'step_num' => $i
	  	]);

	  	$step->save();
	  	$steps[] = $step;
	  }

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
