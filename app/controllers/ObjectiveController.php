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


}
