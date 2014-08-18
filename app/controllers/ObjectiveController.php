<?php

class ObjectiveController extends \BaseController {

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

		if(Auth::user()->is_admin || 
			Auth::user()->id == $objective->step->commitment->government_user || 
			Auth::user()->id == $objective->step->commitment->society_user){
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

		if(Auth::user()->is_admin || 
			Auth::user()->id == $objective->step->commitment->government_user || 
			Auth::user()->id == $objective->step->commitment->society_user){

		  $objective->fill(Input::all());
		  $objective->save();

		  return Redirect::to('commitment/' . $objective->step->commitment->id . '/edit');
	  }
	  else{
	  	return Redirect::to('commitment');
	  }
	}


}
