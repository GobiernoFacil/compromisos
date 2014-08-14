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
		return View::make('admin.objectives_update')->with('objective', $objective);
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
		$objective->fill(Input::all());
		$objective->save();

		return Redirect::to('commitment/' . $objective->step->commitment->id . '/edit');
	}


}
