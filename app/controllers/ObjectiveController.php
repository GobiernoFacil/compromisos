<?php

class ObjectiveController extends \BaseController {

	// THE PATH TO THE FILE UPLOAD
	const FILES_DIR = './files';

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$objective = Objective::find($id);

		if(Auth::user()->is_admin || $objective->step->commitment->users->find(Auth::user()->id) ){
			return View::make('admin.objectives_update')->with('objective', $objective);
	  }
	  else{
	  	return Redirect::to('commitment');
	  }
	}
	
	/**
	 * Show the form for conclude the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function conclude($id)
	{
		//
		$objective = Objective::find($id);

		if(Auth::user()->is_admin || $objective->step->commitment->users->find(Auth::user()->id) ){
			return View::make('admin.objectives_conclude')->with('objective', $objective);
		}
		else{
	  		return Redirect::to('commitment');
	  	}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function store()
	{
		// CREATE ONE EVENT FOR EVERY STEP
	  	$objective = new Objective([
	  			'step_id'   => Input::get('step_id'),
	  			'step_num'  => Input::get('step_num'),
	  			'event_num' => Input::get('event_num') + 1,
	  			'status'    => 'a'
	  	]);
	  	$objective->save();
	  	
	  	return Redirect::back();
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
		$objective = Objective::find($id);

		if(Auth::user()->is_admin || $objective->step->commitment->users->find(Auth::user()->id) ){

		  $objective->fill(Input::all());

		 // SAVE VERIFICATION FILE; DELETE PREVIOUS FILE IF EXIST
	  if(Input::hasFile('mir_file')){
	  	$name = uniqid() . '.' . Input::file('mir_file')->getClientOriginalExtension();
	  	Input::file('mir_file')->move(self::FILES_DIR, $name);
	  	$objective->mir_file = $name;
	  }

		  // set the objective status
		  if($objective->finish_description != ""){
		  	$objective->status = 'c';
		  }
		  elseif($objective->advance_description != ""){
		  	$objective->status = 'b';
		  }
		  else{
		  	$objective->status = 'a';
		  }

		  $objective->save();

		  return Redirect::to('commitment/' . $objective->step->commitment->id . '/edit');
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
		$objective = Objective::find($id);
		$objective->delete();
	  	return Redirect::back();
	}

}