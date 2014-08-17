<?php

class CommitmentController extends \BaseController {

	const FILES_DIR = './public/files';

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
      ->where(function($query){
      	if(! Auth::user()->is_admin){
      		$query->where('government_user', Auth::user()->id)
      	    ->orWhere('society_user', Auth::user()->id);
      	}
      })
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
	  $commitment = new Commitment(Input::all());

	  if(Input::hasFile('plan')){
	  	$name = uniqid() . '.' . Input::file('plan')->getClientOriginalExtension();
	  	Input::file('plan')->move(self::FILES_DIR, $name);
	  	$commitment->plan = $name;
	  }

	  $commitment->save();

	  // CREATE THE FOUR STEPS
	  for($i = 1; $i <= 4; $i++ ){
	  	$step = new Step([
	  	  'commitment_id' => $commitment->id,
	      'ends'          => date('Y-m-d'),
	  	  'step_num'      => $i
	  	]);

	  	$step->save();

	  	// CREATE THREE EVENTS FOR EVERY STEP
	  	$events_num = $step->step_num == 4 ? 1 : 3;
	  	for($j = 0; $j < $events_num; $j++){
	  		$objective = new Objective([
	  			'step_id'   => $step->id,
	  			'step_num'  => $step->step_num,
	  			'event_num' => $j + 1,
	  			'status'    => 'a'
	  		]);
	  		$objective->save();
	  	}
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
		$commitment       = Commitment::with('steps.objectives')->find($id);
		$government_users = User::where('user_type', 'government')->lists('name','id');
	  $society_users    = User::where('user_type', 'society')->lists('name','id');
		return View::make('admin.commitments_update')
		  ->with([
		  	  'commitment'       => $commitment,
		  	  'government_users' => $government_users,
		  	  'society_users'    => $society_users
		  	]);
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
		$commitment = Commitment::find($id);
		$commitment->title = Input::get('title');
		$commitment->government_user = Input::get('government_user');
		$commitment->society_user = Input::get('society_user');

		// update the new file if exist, and remove the previous file
		if(Input::hasFile('plan')){
			@unlink(self::FILES_DIR . '/' . $commitment->plan);

	  	$name = uniqid() . '.' . Input::file('plan')->getClientOriginalExtension();
	  	Input::file('plan')->move(self::FILES_DIR, $name);
	  	$commitment->plan = $name;
	  }

		$commitment->save();

    // SAVE THE DATES FOR EACH STEP
    for($i = 1; $i <= 4; $i++){
      Step::where([
        'commitment_id' => $commitment->id, 
        'step_num' => $i
      ])->update(['ends' => Input::get('step-' . $i)]);
    }

		return Redirect::to('commitment');
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
		$commitment = Commitment::find($id);

		if( ! empty($commitment->plan) ){
			@unlink(self::FILES_DIR . '/' . $commitment->plan);
	  }

		$commitment->delete();
		return Redirect::to('commitment');
	}


}
