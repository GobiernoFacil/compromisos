<?php

class ObjectiveController extends \BaseController {

	// THE PATH TO THE FILE UPLOAD
	// aquí está medio raro, pues antes functionaba
	// con ./files y ahora tuve que cambiar la ruta. 
	// fomofo
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
		$commitment_id = Input::get('commitment_id');
		$step_num	= Input::get('step_num');
		
		// CREATE ONE EVENT FOR STEP	  	
	  	$objective = new Objective([
	  			'step_id'   => Input::get('step_id'),
	  			'step_num'  => Input::get('step_num'),
	  			'event_num' => Input::get('event_num') + 1,
	  			'status'    => 'a'
	  	]);
	  	$objective->save();
	  	
	  	return Redirect::to('commitment/'. $commitment_id .'/edit/#meta-'. $step_num);
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

		// THE NEWLY REVAMPED AGENTS CREATION DOKI DOKI
		$agents_num = count( Input::get('agent') );
		$agents = Input::get('agent');
		$urls   = Input::get('agent_url');
		
		if($agents_num){
			// remove the previous agents. Yep, cheap trick.
			$affectedRows = Agent::where('objective_id', $objective->id)->delete();
			for($i = 0; $i < $agents_num; $i++ ){
				if($agents[$i] != '' || $urls[$i] != ''){
					$a = new Agent;
					$a->objective_id = $objective->id;
					$a->agent        = $agents[$i];
					$a->agent_url    = $urls[$i];
					$a->save();
				}
			}
		}
	  // THAT'S ALL FOLKS

		if(Auth::user()->is_admin || $objective->step->commitment->users->find(Auth::user()->id) ){

		  $objective->fill(Input::all());

		 // SAVE VERIFICATION FILE; DELETE PREVIOUS FILE IF EXIST
	  if(Input::hasFile('mir_file')){
	  	$name = uniqid() . '.' . Input::file('mir_file')->getClientOriginalExtension();
	  	Input::file('mir_file')->move(self::FILES_DIR, $name);
	  	$objective->mir_file = $name;
	  }

	  /*** NEW STUFF ***/
	  // SAVE SELFIE FILE; DELETE PREVIOUS FILE IF EXIST
	  if(Input::hasFile('selfie')){
	  	$name = uniqid() . '.' . Input::file('selfie')->getClientOriginalExtension();
	  	Input::file('selfie')->move(self::FILES_DIR, $name);
	  	$objective->selfie = $name;
	  }
	  /*** ENDS NEW STUFF ***/

		  // set the objective status
		  if($objective->finish_description != "" && (!empty($objective->url) || !empty($objective->mir_url) || !empty($objective->mir_file))){
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
		if( ! empty($objective->selfie) ) @unlink(self::FILES_DIR . '/' . $objective->selfie);
		$objective->delete();
	  return Redirect::back();
	}

}