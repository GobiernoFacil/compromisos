<?php

class CommitmentController extends \BaseController {

	// THE PATH TO THE FILE UPLOAD
	const FILES_DIR = './files';

	public function __construct(){
		// REQUIRES LOGIN ACCESS
		 $this->beforeFilter('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  // GET THE COMMITMENTS DATA FOR THE ADMIN LIST
	  if(Auth::user()->is_admin){
	  	$commitments = Commitment::all();
	  }
	  else{
	  	$commitments = Auth::user()->commitments;
	  }

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
	  // ONLY THE ADMIN CAN CREATE COMMITMENTS
	  if(! Auth::user()->is_admin ) return Redirect::to('commitment');

	  $users = User::all()->lists('name','id');
	  return View::make('admin.commitments_add')
	    ->with(['users' => $users]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	  // ONLY THE ADMIN CAN CREATE COMMITMENTS
	  if(! Auth::user()->is_admin ) return Redirect::to('commitment');

	  $commitment = new Commitment(Input::all());

	  // SAVE DESCRIPTION FILE; DELETE PREVIOUS FILE IF EXIST
	  if(Input::hasFile('plan')){
	  	$name = uniqid() . '.' . Input::file('plan')->getClientOriginalExtension();
	  	Input::file('plan')->move(self::FILES_DIR, $name);
	  	$commitment->plan = $name;
	  }
	  
	  $commitment->save();

	  // UPDATE THE USERS
	  $users_array = array_unique(Input::get('users'));
	  foreach($users_array AS $key => $value){
	  	DB::table('commitment_user')->insert([
	  		'user_id' => $value,
	  		'commitment_id' => $commitment->id
	  	]);
	  }
	  
	  // CREATE THE FOUR STEPS
	  // the default dates
	  $dates = [
	    mktime(0,0,0,10,27,2014),
	    mktime(0,0,0,3,8,2015),
	    mktime(0,0,0,7,22,2015),
	    mktime(0,0,0,12,31,2015),
	  ];
	  for($i = 1; $i <= 4; $i++ ){
	  	$step = new Step([
	  	  'commitment_id' => $commitment->id,
	      'ends'          => date('Y-m-d', $dates[$i-1]),
	  	  'step_num'      => $i
	  	]);

	  	$step->save();

	  	// CREATE ONE EVENT FOR EVERY STEP
	  	$objective = new Objective([
	  			'step_id'   => $step->id,
	  			'step_num'  => $step->step_num,
	  			'event_num' => 1,
	  			'status'    => 'a'
	  	]);
	  	$objective->save();
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
		$commitment = Commitment::with('steps.objectives')->find($id);


		if(Auth::user()->is_admin || $commitment->users->find(Auth::user()->id)){

		  $users = User::all()->lists('name','id');
		  return View::make('admin.commitments_update')
		    ->with([
		  	  'commitment' => $commitment,
		  	  'users'      => $users
		  ]);

		}
		else{
			return Redirect::to('commitment');
		}
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

		if(Auth::user()->is_admin || $commitment->users->find(Auth::user()->id)){

		  $commitment->fill(Input::all());

		  // update the new file if exist, and remove the previous file
		  if(Input::hasFile('plan')){
			  @unlink(self::FILES_DIR . '/' . $commitment->plan);

	  	  $name = uniqid() . '.' . Input::file('plan')->getClientOriginalExtension();
	  	  Input::file('plan')->move(self::FILES_DIR, $name);
	  	  $commitment->plan = $name;
	    }

		  $commitment->save();

		  // UPDATE THE USERS (only for admin)
		  if(Auth::user()->is_admin){
		    DB::table('commitment_user')->where('commitment_id', $commitment->id)->delete();
	      $users_array = array_unique(Input::get('users'));
	      foreach($users_array AS $key => $value){
	  	    DB::table('commitment_user')->insert([
	  		    'user_id' => $value,
	  		    'commitment_id' => $commitment->id
	  	    ]);
	      }
	    }

      // SAVE THE DATES FOR EACH STEP
      for($i = 1; $i <= 4; $i++){
        Step::where([
          'commitment_id' => $commitment->id, 
          'step_num' => $i
        ])->update(['ends' => Input::get('step-' . $i)]);
      }

		  return Redirect::to('commitment');
		}
		else{
			return Redirect::to('commitment');
		}
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
		if(! Auth::user()->is_admin ) return Redirect::to('commitment');
		
		$commitment = Commitment::find($id);

		if( ! empty($commitment->plan) ){
			@unlink(self::FILES_DIR . '/' . $commitment->plan);
	  }

		$commitment->delete();
		return Redirect::to('commitment');
	}


}
