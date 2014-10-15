<?php

class CommitmentFrontController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  //
	  
	   // ordena compromisos por número de compromiso 
	   $commitments = Commitment::orderBy('commitment_num', "ASC")->get();

	   return View::make('compromisos.compromisos')
	     ->with('commitments', $commitments);
	}
	
	/**
	 * Show the projects for the specified user id.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function project($id)
	{
		// obtenemos compromisos por usuario
		$project	= User::find($id)->commitments;
		
		return View::make('compromisos.project')
			->with('commitments', $project);		
	}
}